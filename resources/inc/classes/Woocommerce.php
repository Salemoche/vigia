<?php
/**
 * ========================================
 *
 * Woocommerce functionality the Vigia Theme
 *
 * @package Vigia
 *
 * ========================================
 */

namespace Vigia\classes;

use Vigia\traits\Singleton;

class Woocommerce {
    use Singleton;

    protected function __construct() {
        $this->setup_hooks();
    }

    protected function setup_hooks() {
        add_action( 'after_setup_theme', [ $this, 'setup_woocommerce' ] );
    }

    public function setup_woocommerce() {

        add_theme_support( 'woocommerce' );

        // Remove default styling
        add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

        // Remove Breadcrumbs
        remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);

        // Remove Sorting
        remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
        remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
        remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

        $this->customize_content_product();
    }

    public function customize_content_product() {

        // remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
        remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
        // add_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', );

        add_action('woocommerce_after_shop_loop_item', function ($product) {

                if ( ! is_object( $product ) ) {
                    global $product;
                }

                echo '<div class="p-5">' . $product->get_short_description() . '</div>';
            },
            15
        );

    }
}
