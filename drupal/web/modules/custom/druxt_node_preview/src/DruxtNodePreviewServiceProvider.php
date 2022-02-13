<?php

namespace Drupal\druxt_node_preview;

use Drupal\Core\DependencyInjection\ContainerBuilder;
use Drupal\Core\DependencyInjection\ServiceModifierInterface;

/**
 * Configure CORS supportCredentials option.
 */
class DruxtNodePreviewServiceProvider implements ServiceModifierInterface {

  /**
   * {@inheritdoc}
   */
  public function alter(ContainerBuilder $container) {
    $cors_config = $container->getParameter('cors.config');
    if (!$cors_config['supportsCredentials']) {
      $cors_config['supportsCredentials'] = TRUE;
      $container->setParameter('cors.config', $cors_config);
    }
  }

}
