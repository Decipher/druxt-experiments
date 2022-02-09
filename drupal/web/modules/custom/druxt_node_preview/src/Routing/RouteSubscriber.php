<?php
namespace Drupal\druxt_node_preview\Routing;

use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;

/**
 * RouterSubsciber for altering routes.
 */
class RouteSubscriber extends RouteSubscriberBase {

  /**
   * {@inheritdoc}
   */
  protected function alterRoutes(RouteCollection $collection) {
    if ($route = $collection->get('entity.node.preview')) {
      $route->setDefaults(array(
        '_controller' => '\Drupal\druxt_node_preview\Controller\NodePreviewController::view',
      ));
    }
  }

}
