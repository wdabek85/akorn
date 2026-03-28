<?php

/**
 * Theme setup.
 */

namespace App;


use Illuminate\Support\Facades\Vite;

/**
 * Inject styles into the block editor.
 *
 * @return array
 */
add_filter('block_editor_settings_all', function ($settings) {
    $style = Vite::asset('resources/css/editor.css');

    $settings['styles'][] = [
        'css' => "@import url('{$style}')",
    ];

    return $settings;
});

/**
 * Inject scripts into the block editor.
 *
 * @return void
 */
add_filter('admin_head', function () {
    if (! get_current_screen()?->is_block_editor()) {
        return;
    }

    $dependencies = json_decode(Vite::content('editor.deps.json'));

    foreach ($dependencies as $dependency) {
        if (! wp_script_is($dependency)) {
            wp_enqueue_script($dependency);
        }
    }

    echo Vite::withEntryPoints([
        'resources/js/editor.js',
    ])->toHtml();
});

/**
 * Use the generated theme.json file.
 *
 * @return string
 */
add_filter('theme_file_path', function ($path, $file) {
    return $file === 'theme.json'
        ? public_path('build/assets/theme.json')
        : $path;
}, 10, 2);

/**
 * Register the initial theme setup.
 *
 * @return void
 */
add_action('after_setup_theme', function () {

    /**
     * Disable full-site editing support.
     *
     * @link https://wptavern.com/gutenberg-10-5-embeds-pdfs-adds-verse-block-color-options-and-introduces-new-patterns
     */
    remove_theme_support('block-templates');

    /**
     * Register the navigation menus.
     *
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage'),
    ]);

    /**
     * Disable the default block patterns.
     *
     * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-the-default-block-patterns
     */
    remove_theme_support('core-block-patterns');

    /**
     * Enable plugins to manage the document title.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Enable post thumbnail support.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable responsive embed support.
     *
     * @link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/#responsive-embedded-content
     */
    add_theme_support('responsive-embeds');

    /**
     * Enable HTML5 markup support.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', [
        'caption',
        'comment-form',
        'comment-list',
        'gallery',
        'search-form',
        'script',
        'style',
    ]);

    /**
     * Enable selective refresh for widgets in customizer.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#customize-selective-refresh-widgets
     */
    add_theme_support('customize-selective-refresh-widgets');
}, 20);

/**
 * Register the theme sidebars.
 *
 * @return void
 */
/**
 * Register Custom Post Types.
 */
add_action('init', function () {
    register_post_type('portfolio', [
        'labels' => [
            'name'               => 'Portfolio',
            'singular_name'      => 'Realizacja',
            'add_new'            => 'Dodaj realizację',
            'add_new_item'       => 'Dodaj nową realizację',
            'edit_item'          => 'Edytuj realizację',
            'all_items'          => 'Wszystkie realizacje',
            'search_items'       => 'Szukaj realizacji',
            'not_found'          => 'Nie znaleziono realizacji',
        ],
        'public'       => true,
        'has_archive'  => true,
        'rewrite'      => ['slug' => 'portfolio'],
        'menu_icon'    => 'dashicons-portfolio',
        'menu_position' => 25,
        'supports'     => ['title', 'editor', 'thumbnail', 'excerpt'],
        'show_in_rest' => true,
    ]);

    register_taxonomy('portfolio_category', 'portfolio', [
        'labels' => [
            'name'          => 'Kategorie portfolio',
            'singular_name' => 'Kategoria',
            'add_new_item'  => 'Dodaj kategorię',
            'search_items'  => 'Szukaj kategorii',
        ],
        'public'       => true,
        'hierarchical' => true,
        'rewrite'      => ['slug' => 'portfolio-kategoria'],
        'show_in_rest' => true,
    ]);
});

/**
 * Register ACF Options Pages.
 */
add_action('acf/init', function () {
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page([
            'page_title' => 'Opinie klientów',
            'menu_title' => 'Opinie klientów',
            'menu_slug'  => 'opinie-klientow',
            'capability'  => 'edit_posts',
            'icon_url'    => 'dashicons-format-quote',
            'position'    => 30,
            'redirect'    => false,
        ]);

        acf_add_options_page([
            'page_title' => 'Mega Menu — Usługi',
            'menu_title' => 'Mega Menu',
            'menu_slug'  => 'mega-menu',
            'capability'  => 'edit_posts',
            'icon_url'    => 'dashicons-menu',
            'position'    => 31,
            'redirect'    => false,
        ]);
    }
});

/**
 * Register the theme sidebars.
 *
 * @return void
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ];

    register_sidebar([
        'name' => __('Primary', 'sage'),
        'id' => 'sidebar-primary',
    ] + $config);

    register_sidebar([
        'name' => __('Footer', 'sage'),
        'id' => 'sidebar-footer',
    ] + $config);
});
