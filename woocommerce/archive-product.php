<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

// get_header( 'shop' );

$cart = WC()->cart;
$totals = $cart->get_totals()['total'];

?>

<header class="banner vigia-header top-0 lg:top-unset 3xl:border-b-3 border-black">

  <?php if (has_nav_menu('primary_navigation')): ?>
    <nav class="nav-primary vigia-navigation mx-auto max-w-screen-3xl lg:border-b-3 lg:border-t-0 w-full  //bs-todo3xl:border-x-3 3xl:border-b-0 border-black" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
      <?php echo wp_nav_menu([
        'theme_location'  => 'primary_navigation',
        'menu_class'      => 'nav flex flex-row lg:flex-column flex-wrap lg:flex-nowrap max-w-screen-3xl mx-auto',
        'echo'            => false,
        'add_li_class'    => 'vigia-menu-item border-black'
      ]) ?>
    </nav>
  <?php endif; ?>
    <div class="w-full border-black border-b-3">
        <a href="<?php echo get_permalink( wc_get_page_id( 'checkout' ) ) ?>" class="vigia-simple-header group flex items-center justify-center max-w-screen-3xl //bs-todo3xl:border-x-3 mx-auto border-black text-base lg:text-lg p-2.5 text-center relative block transition-color duration-medium hover:bg-black hover:text-white" >
            <span class="vigia-after-arrow vigia-after-arrow-right vigia-after-arrow-hover after:ml-1 after:translate-y-0.5" ><span class="vigia-totals"><?php echo WC()->cart->get_cart_total() .  __( ', Kasse', 'vigia' ) ?></span>
        </a>
    </div>
</header>

<?php

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>

<main id="main" class="main">
    <div class="vigia-content vigia-content-<?php echo get_post_type() ?>">
    <!-- <header class="woocommerce-products-header">
        < ?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
            <h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
        < ?php endif; ?>

        < ?php
        /**
         * Hook: woocommerce_archive_description.
         *
         * @hooked woocommerce_taxonomy_archive_description - 10
         * @hooked woocommerce_product_archive_description - 10
         */
        do_action( 'woocommerce_archive_description' );
        ?>
    </header> -->
    <?php
    if ( woocommerce_product_loop() ) {

        /**
         * Hook: woocommerce_before_shop_loop.
         *
         * @hooked woocommerce_output_all_notices - 10
         * @hooked woocommerce_result_count - 20
         * @hooked woocommerce_catalog_ordering - 30
         */
        do_action( 'woocommerce_before_shop_loop' );

        woocommerce_product_loop_start();

        if ( wc_get_loop_prop( 'total' ) ) {
            while ( have_posts() ) {
                the_post();

                /**
                 * Hook: woocommerce_shop_loop.
                 */
                do_action( 'woocommerce_shop_loop' );

                wc_get_template_part( 'content', 'product' );
            }
        }

        woocommerce_product_loop_end();

        /**
         * Hook: woocommerce_after_shop_loop.
         *
         * @hooked woocommerce_pagination - 10
         */
        do_action( 'woocommerce_after_shop_loop' );
    } else {
        /**
         * Hook: woocommerce_no_products_found.
         *
         * @hooked wc_no_products_found - 10
         */
        do_action( 'woocommerce_no_products_found' );
    }

    $post = get_post( wc_get_page_id( 'shop' ) );

    ?>

    <div class="vigia-inner">
    <?php echo $post->post_content; ?>
    </div>

    <?php

    /**
     * Hook: woocommerce_after_main_content.
     *
     * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
     */
    // do_action( 'woocommerce_after_main_content' );

    /**
     * Hook: woocommerce_sidebar.
     *
     * @hooked woocommerce_get_sidebar - 10
     */
    // do_action( 'woocommerce_sidebar' );

    // get_footer( 'shop' );
    ?>
    </div>
</main>
