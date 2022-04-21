<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

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
</header>


	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>


<main id="main" class="main">
    <div class="vigia-content vigia-content-<?php echo get_post_type() ?>">

    <!-- <div class="w-full border-black border-b-3">
        <a href="< ?php echo get_permalink( wc_get_page_id( 'checkout' ) ) ?>" class="vigia-simple-header group flex items-center justify-center max-w-screen-3xl //bs-todo3xl:border-x-3 mx-auto border-black text-base lg:text-lg p-2.5 text-center relative block transition-color duration-medium hover:bg-black hover:text-white" >
            <span class="vigia-after-arrow vigia-after-arrow-right vigia-after-arrow-hover after:ml-1 after:translate-y-0.5" ><span class="vigia-totals"><?php echo WC()->cart->get_cart_total() .  __( ', Kasse', 'vigia' ) ?></span>
        </a>
    </div> -->

            <?php while ( have_posts() ) : ?>
                <?php the_post(); ?>

                <?php wc_get_template_part( 'content', 'single-product' ); ?>

            <?php endwhile; // end of the loop. ?>

        <?php
            /**
             * woocommerce_after_main_content hook.
             *
             * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
             */
            do_action( 'woocommerce_after_main_content' );
        ?>

        <?php
            /**
             * woocommerce_sidebar hook.
             *
             * @hooked woocommerce_get_sidebar - 10
             */
            do_action( 'woocommerce_sidebar' );
        ?>
    </div>
</main>
    <?php
// get_footer( 'shop' );
/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
