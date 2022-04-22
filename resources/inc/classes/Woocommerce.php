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

        // add ajax add to cart
        add_action( 'wp_enqueue_scripts', [$this, 'add_ajax_cart'], 99);
        add_action( 'wp_ajax_ql_woocommerce_ajax_add_to_cart', [$this, 'ql_woocommerce_ajax_add_to_cart'] );
        add_action( 'wp_ajax_nopriv_ql_woocommerce_ajax_add_to_cart', [$this, 'ql_woocommerce_ajax_add_to_cart'] );
        add_filter( 'woocommerce_add_to_cart_fragments', [$this, 'woocommerce_header_add_to_cart_fragment'] );

        add_filter('woocommerce_default_address_fields', [$this, 'override_default_address_checkout_fields'], 20, 1);

        // checkout
        add_filter( 'woocommerce_checkout_fields' , [$this, 'override_billing_checkout_fields'], 20, 1 );



        $this->customize_content_product();
    }

    public function customize_content_product() {


        /**========================
        *	Change Thumbnail Link from loop product
        *========================*/

        remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
        add_action( 'woocommerce_before_shop_loop_item', function () {
            if ( null !== get_field( 'linked_magazine' )) {
                echo '<a href="' . get_the_permalink(get_field( 'linked_magazine' )) . '"class="group vigia-loop-product relative inline-block woocommerce-LoopProduct-link woocommerce-loop-product__link">';
            } else {
                echo '<div class="group vigia-loop-product relative woocommerce-LoopProduct-link woocommerce-loop-product__link">';
            }
            echo wp_get_attachment_image( get_field( 'hover_image' )['ID'], 'large', "", [ 'class' => "w-full absolute z-10 opacity-0 transition-opacity duration-medium group-hover:opacity-100 top-0"] );
        }, 10 );

        remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 10 );
        add_action( 'woocommerce_after_shop_loop_item', function () {
            if ( null !== get_field( 'linked_magazine' )) {
                echo '</a>';
            } else {
                echo '</div>';
            }
        }, 10 );


        /**========================
        *	Remove Title and add description
        *========================*/

        remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
        add_action('woocommerce_after_shop_loop_item', function ($product) {

                if ( ! is_object( $product ) ) {
                    global $product;
                }
                echo '<div class="p-5 text-center">' . $product->get_short_description() . '</div>';
            },
            15
        );

        /**========================
        *	Add Euro Price
        *========================*/

        // add_filter('formatted_woocommerce_price', function ($filter) {
        //     $euro_price = null !== get_field( 'euro_price' ) ? get_field( 'euro_price' ) . ' EUR '  : '';
        //     return $filter . $euro_price;
        //     }, 10
        // );

    }


    /**========================
    *	Cart
    *========================*/

    // cart button

    public function add_ajax_cart() {
        if (function_exists('is_shop') && is_shop()) {
            wp_enqueue_script('custom_script', get_bloginfo('stylesheet_directory') . '/resources/scripts/modules/ajax_add_to_cart.js', array('jquery'),'1.0' );
        }
    }

    public function ql_woocommerce_ajax_add_to_cart() {
        $product_id = apply_filters('ql_woocommerce_add_to_cart_product_id', absint($_POST['product_id']));
        $quantity = empty($_POST['quantity']) ? 1 : wc_stock_amount($_POST['quantity']);
        $variation_id = absint($_POST['variation_id']);
        $passed_validation = apply_filters('ql_woocommerce_add_to_cart_validation', true, $product_id, $quantity);
        $product_status = get_post_status($product_id);
        if ($passed_validation && WC()->cart->add_to_cart($product_id, $quantity, $variation_id) && 'publish' === $product_status) {
            do_action('ql_woocommerce_ajax_added_to_cart', $product_id);
            if ('yes' === get_option('ql_woocommerce_cart_redirect_after_add')) {
                wc_add_to_cart_message(array($product_id => $quantity), true);
            }
            WC_AJAX :: get_refreshed_fragments();

        } else {
            $data = array(
                'error' => true,
                'product_url' => apply_filters('ql_woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id));
            echo wp_send_json($data);
        }
        wp_die();
    }

    // show cart contents

    public function woocommerce_header_add_to_cart_fragment( $fragments ) {
        global $woocommerce;

        ob_start();

        ?>
        <span class="cart-customlocation vigia-after-arrow vigia-after-arrow-right vigia-after-arrow-hover after:ml-1 after:translate-y-0.5" ><span class="vigia-totals"><?php echo WC()->cart->get_cart_total() ?><span><?php echo __( ', Kasse', 'vigia' ) ?></span>

        <?php
        $fragments['span.cart-customlocation'] = ob_get_clean();
        return $fragments;
    }

    // custom form

    public function override_default_address_checkout_fields( $address_fields ) {
        $address_fields['first_name']['placeholder'] = 'Vorname *';
        $address_fields['last_name']['placeholder'] = 'Nachname *';
        $address_fields['address_1']['placeholder'] = 'Adresse *';
        $address_fields['street']['placeholder'] = 'Strasse *';
        $address_fields['state']['placeholder'] = 'Kanton/Bundesland';
        $address_fields['postcode']['placeholder'] = 'Postleitzahl *';
        $address_fields['city']['placeholder'] = 'Ort *';
        return $address_fields;
    }


    /**========================
    *	Checkout
    *========================*/
    // custom form

    public function override_billing_checkout_fields( $fields ) {
        $fields['billing']['billing_phone']['placeholder'] = 'Telefon';
        $fields['billing']['billing_email']['placeholder'] = 'Email *';
        return $fields;
    }
}
