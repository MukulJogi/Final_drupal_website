<?php

namespace Drupal\first_module\Plugin\Block;

use Drupal\Core\Block\BlockBase;


/**
 * Provides a First Block.
 *
 * @Block(
 *   id = "my_first_block",
 *   admin_label = @Translation("First Block"),
 *   category = "custom"
 * )
 */
class FirstBlock extends BlockBase
{

    /**
     * 
     */
    public function build()
    {
        return [
            "#type" => "markup",
            "#markup" => "This is our First Block Example",
        ];
    }
}
