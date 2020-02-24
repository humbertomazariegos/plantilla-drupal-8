<?php

namespace Drupal\demo\Plugin\Block;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Session\AccountInterface;

/**
 * Provides a bloque block.
 *
 * @Block(
 *   id = "demo_bloque",
 *   admin_label = @Translation("Bloque"),
 *   category = @Translation("Custom")
 * )
 */
class BloqueBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  protected function blockAccess(AccountInterface $account) {
    // @DCG Evaluate the access condition here.
    $condition = TRUE;
    return AccessResult::allowedIf($condition);
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build['content'] = [
      '#markup' => $this->t('Hola Edgar!'),
    ];
    return $build;
  }

}
