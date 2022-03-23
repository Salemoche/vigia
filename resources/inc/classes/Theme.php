<?php
/**
 * ========================================
 *
 * Bootstrap the Kaspar Blumen Theme
 *
 * @package Kaspar Blumen
 *
 * ========================================
 */

namespace Vigia\classes;

use Vigia\traits\Singleton;

class Theme {
    use Singleton;

    protected function __construct() {
        // load class

        // Blocks::get_instance();
        define( 'VIGIA_BLOCK_TEMPLATE_DIR',  get_template_directory() . '/resources/block-templates/');

        $this->setup_hooks();
    }

    protected function setup_hooks() {
        // actions and filters

        add_action( 'init', [ $this, 'init' ] );
        add_action( 'after_setup_theme', [ $this, 'setup_theme' ] );
        add_action('block_categories_all', [$this, 'add_block_categories']);
        add_action('acf/init', [$this, 'register_blocks']);

        add_filter('nav_menu_css_class', [$this, 'add_additional_class_on_li'], 1, 3);
    }

    public function setup_theme() {

        /**================
         * Theme Support
         ================*/
        $this->add_options_page();
        $this->change_post_type_labels();
        add_theme_support( 'woocommerce' );

        // add_theme_support( 'title-tag' );

        // add_theme_support( 'custom-logo', [
        //     'header-text'   => ['site-title', 'site-description'],
        //     'height'        => 100,
        //     'width'         => 400,
        //     'flex-height'   => true,
        //     'flex-width'    => true
        // ] );

        // add_theme_support( 'post-thumbnails' );

        // add_image_size( 'featured-thumbnail', 350, 233, true); // get this size from the inspector to see how big the image should be

        // add_theme_support( 'customize-selective-refresh-widgets' );

        // add_theme_support( 'automatic-feed-links' );

        // add_theme_support(
        //     'html5',
        //     [
        //         'search-form',
        //         'comment-form',
        //         'comment-list',
        //         'gallery',
        //         'caption',
        //         'script',
        //         'style'
        //     ]
        // );

        // add_theme_support( 'wp-block-style' );

        // add_theme_support( 'align-wide' );

        // add_theme_support( 'editor-styles' );
        // add_editor_style( 'assets/build/css/editor.css' );

        // $this->add_options_page();

        // global $content_width;
        // if ( !isset( $content_width ) ) {
        //     $content_width = 1240;
        // }


        /**================
         * Custom Admin Menu
        ================*/

        add_filter('custom_menu_order', '__return_true');
        add_filter('menu_order', [$this, 'custom_menu_order']);


        /**================
         * Data handling
        ================*/
        add_filter('upload_mimes', function($mimes) {
            $mimes['svg'] = 'image/svg+xml';
            return $mimes;
        });
    }

    public function init() {

        /*====================
        * Register Menus
        *====================*/

        function register_menus() {
            register_nav_menu('header-menu', __('Header Menu'));
            register_nav_menu('footer-menu', __('Footer Menu'));
        }

        register_menus();

        /*====================
        * Add Post Types
        *====================*/

        function add_post_types() {
            register_post_type('zeitschrift',
            array(
                'labels'      => array(
                    'name'          => __('Zeitschriften', 'vigia'),
                    'singular_name' => __('Zeitschrift', 'vigia'),
                ),
                'has_archive' => true,
                'menu_position' => -3,
                'menu_icon' => 'dashicons-book',
                'supports' => [
                    'custom-fields',
                    'page-attributes',
                    'post-formats',
                    'title',
                    'thumbnail',
                    'editor',
                    'excerpt',
                    'categories'
                ],
                'taxonomies' => [
                    'category',
                ],
            )
        );
        }

        add_post_types();
    }

    public function change_post_type_labels() {

        $get_post_type = get_post_type_object('post');
        // echo '<hr><pre class="sm-debug">';
        // print_r($get_post_type);
        // echo '</pre><hr>';
        // wp_die();
        $labels = $get_post_type->labels;
        $labels->name = 'Artikel';
        $labels->singular_name = 'Artikel';
        $labels->add_new = 'Artikel hinzufügen';
        $labels->add_new_item = 'Artikel hinzufügen';
        $labels->edit_item = 'Artikel bearbeiten';
        $labels->new_item = 'Artikel';
        $labels->view_item = 'Artikel ansehen';
        $labels->search_items = 'Artikel durchsuchen';
        $labels->not_found = 'Keine Artikel gefunden';
        $labels->not_found_in_trash = 'Keine Artikel im Papierkorb gefunden';
        $labels->all_items = 'Alle Artikel';
        $labels->menu_name = 'Artikel';
        $labels->name_admin_bar = 'Artikel';
        $get_post_type->menu_icon = 'dashicons-admin-settings';
    }

    public function add_options_page() {
        if( function_exists('acf_add_options_page') ) {

            acf_add_options_page([
                'page_title'    => 'Seiten Einstellungen',
                'menu_title'    => 'Seiten Einstellungen',
                'menu_slug'     => 'site-settings',
                'menu_order'         => '-100'
            ]);

        }
    }

    public function custom_menu_order($menu_order) {
        return array(
            'index.php',
            // 'ai1wm_export',
            'site-settings',
            'edit.php?post_type=page',
            'edit.php',
            'edit-comments.php'
        );
    }

    public function mime_types($mimes) {
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
    }

    public function add_additional_class_on_li($classes, $item, $args) {
        if(isset($args->add_li_class)) {
            $classes[] = $args->add_li_class;
        }
        return $classes;
    }


    /**
    *========================================
    *
    *	Blocks
    *
    *========================================
    */

    /**========================
    *	Register Block Categories
    *========================*/

    public function add_block_categories ( $categories ) {

        $category_slugs = wp_list_pluck( $categories, 'slug' );

        return in_array( 'vigia', $category_slugs, true) ? $categories :
            array_merge ([
                    [
                        'slug' => 'vigia',
                        'title' => __( 'Vigia Blocks', 'vigia' ),
                        'icon' => 'table-row-after'
                    ]
                ],
                $categories
            );
    }


    /**========================
    *	Register Blocks
    *========================*/

    public function register_blocks () {
        if( function_exists('acf_register_block_type') ) {

            acf_register_block_type(array(
                'name'              => 'article_author',
                'title'             => __('Author', 'vigia'),
                'description'       => __('A custom Block for an article author block'),
                'render_template'   => VIGIA_BLOCK_TEMPLATE_DIR . '/article-author.php',
                'category'          => 'vigia',
                'mode'              => 'auto',
                // 'align'             => 'full',
                'icon'              => 'users',
                'keywords'          => array( 'block'),
                // 'enqueue_assets'    => [ $this, 'enqueue_assets' ],
            ));

            acf_register_block_type(array(
                'name'              => 'article_footnotes',
                'title'             => __('Fussnoten', 'vigia'),
                'description'       => __('A custom Block for an article footnotes block'),
                'render_template'   => VIGIA_BLOCK_TEMPLATE_DIR . '/footnotes.php',
                'category'          => 'vigia',
                'mode'              => 'auto',
                // 'align'             => 'full',
                'icon'              => 'menu',
                'keywords'          => array( 'block'),
                // 'enqueue_assets'    => [ $this, 'enqueue_assets' ],
            ));
        }
    }
}
