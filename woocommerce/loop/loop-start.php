<?php
/**
 * Product Loop Start
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="w-full border-black /*border-b-3*/">
    <ul
    class="
        products
        columns-<?php echo esc_attr( wc_get_loop_prop( 'columns' ) ); ?>
        grid
        grid-cols-1
        sm:grid-cols-2
        lg:grid-cols-<?php echo esc_attr( wc_get_loop_prop( 'columns' ) ); ?>
        max-w-screen-3xl
        3xl:border-l-3
        border-black
        block
        mx-auto
    "
    style="width: calc(100% + 3px);"
    >
