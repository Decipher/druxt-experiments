<?php

namespace Drupal\druxt_node_preview\Controller;

use Drupal\node\Controller\NodePreviewController as CoreNodePreviewController;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Url;

/**
 * Defines a controller to render a single node in Druxt preview.
 */
class NodePreviewController extends CoreNodePreviewController {

  /**
   * {@inheritdoc}
   */
  public function view(EntityInterface $node_preview, $view_mode_id = 'full', $langcode = NULL) {
    // Get frontend from request.
    $frontends = druxt_node_preview_frontends();
    $frontend = array_values($frontends)[\Drupal::request()->query->get('frontend')];
    // Otherwise use the first available frontend.
    if (!$frontend) {
      $frontend = array_values($frontends)[0];
    }

    // Get the JSON:API Node Preview URL.
    $jsonapi_node_preview = Url::fromRoute(
      'jsonapi.node--article.individual.preview',
      ['node_preview' => $node_preview->uuid()],
      ['absolute' => TRUE]
    )->toString();

    // Process the frontend URL.
    $tokens = [
      'jsonapi_node_preview' => $jsonapi_node_preview,
      'view_mode' => $view_mode_id,
    ];
    $url = $frontend;
    foreach ($tokens as $token => $value) {
      $url = str_replace("[{$token}]", $value, $url);
    }

    $build = [
      '#theme' => 'druxt_node_preview',
      '#frontend' => $frontend,
      '#jsonapi_node_preview' => $jsonapi_node_preview,
      '#url' => $url,
      '#view_mode_id' => $view_mode_id,
    ];

    // Add support for View mode switching via default Node library.
    $node_preview->preview_view_mode = $view_mode_id;
    $build['#attached']['library'][] = 'node/drupal.node.preview';

    return $build;
  }

}
