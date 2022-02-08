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
    $host = \Drupal::request()->getHost();
    $druxt_node_preview = 'https://' . str_replace('8080', '3000', $host) . '/node/preview';
    $jsonapi_node_preview = Url::fromRoute(
      'jsonapi.node--article.individual.preview',
      ['node_preview' => $node_preview->uuid()],
      ['absolute' => TRUE]
    )->toString();

    $build = [
      '#theme' => 'druxt_node_preview',
      '#druxt_node_preview' => $druxt_node_preview,
      '#jsonapi_node_preview' => $jsonapi_node_preview,
      '#view_mode_id' => $view_mode_id,
    ];

    return $build;
  }

}
