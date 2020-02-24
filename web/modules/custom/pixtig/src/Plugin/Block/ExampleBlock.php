<?php

namespace Drupal\pixtig\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides an example block.
 *
 * @Block(
 *   id = "pixtig_example",
 *   admin_label = @Translation("Example"),
 *   category = @Translation("pixtig")
 * )
 */
class ExampleBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build['content'] = [
      '#markup' => $this->t('Hola Pixtig!'),
    ];
    return $build;
  }

}
