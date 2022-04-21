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

class Gutenberg {
    use Singleton;

    protected function __construct() {
        $this->setup_hooks();
    }

    protected function setup_hooks() {
        add_action( 'after_setup_theme', [ $this, 'setup_gutenberg' ] );

        add_action('block_categories_all', [$this, 'add_block_categories']);
        add_action('acf/init', [$this, 'register_blocks']);
    }

    public function setup_gutenberg() {

        $this->custom_block_font_sizes();
    }

    public function init() {
    }

    /**========================
    *	Custom block font sizes
    *========================*/

    public function custom_block_font_sizes() {
        add_theme_support(
            'editor-font-sizes',
            [
                [
                    'name' => __( 'Small', 'bachstein' ),
                    'size' => 18,
                    'slug' => 'bs-small',
                ],
                [
                    'name' => __( 'Medium', 'bachstein' ),
                    'size' => 26,
                    'slug' => 'bs-medium',
                ],
                [
                    'name' => __( 'Large', 'bachstein' ),
                    'size' => 36,
                    'slug' => 'bs-large',
                ],
            ]
        );

	    // add_theme_support( 'disable-custom-font-sizes' );
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
                'icon'              => 'menu',
                'keywords'          => array( 'block'),
            ));

            acf_register_block_type(array(
                'name'              => 'article_lead',
                'title'             => __('Einleitung', 'vigia'),
                'description'       => __('A custom Block for an article lead block'),
                'render_template'   => VIGIA_BLOCK_TEMPLATE_DIR . '/article-lead.php',
                'category'          => 'vigia',
                'mode'              => 'auto',
                'icon'              => 'menu',
                'keywords'          => array( 'block'),
            ));

            acf_register_block_type(array(
                'name'              => 'accordion',
                'title'             => __('Ausklappbar', 'vigia'),
                'description'       => __('A custom Block for an accordion block'),
                'render_template'   => VIGIA_BLOCK_TEMPLATE_DIR . '/accordion.php',
                'category'          => 'vigia',
                'mode'              => 'auto',
                'icon'              => 'image-flip-vertical',
                'keywords'          => array( 'block'),
            ));
        }
    }
}
