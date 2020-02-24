<?php

namespace Drupal\pixtig\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for pixtig routes.
 */
class PixtigController extends ControllerBase {

  /**
   * Builds the response.
   */
  public function build() {

    $build['content'] = [
      '#type' => 'item',
      '#markup' => $this->t('Esta es una pagina basica!'),
    ];

    return $build;
  }

}
