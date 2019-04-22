<?php
namespace Drupal\drupalup_simple_form\Plugin\Block;
use Drupal\Core\Block\BlockBase;
/**
 * Provides a custom_block.
 *
 * @Block(
 *   id = "custom_b",
 *   admin_label = @Translation("CustomB"),
 *   category = @Translation("hello")
 * )
 */
class CustomB extends BlockBase {
    /**
     * {@inheritdoc}
     */
    public function build() {
        return array(
            '#markup' => rand(0,10000000000000000),
        );

    }
    /**
     * {@inheritdoc}
     */
    public function getCacheMaxAge() {
        return 0;
    }
}
