<?php

namespace App;

use Roots\Sage\Container;
use Roots\Sage\Assets\JsonManifest;
use Roots\Sage\Template\Blade;
use Roots\Sage\Template\BladeProvider;

/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {

    wp_enqueue_style(
        'typography/gotham.css',
        'https://cloud.typography.com/6831932/618846/css/fonts.css',
        false,
        null
    );
    wp_enqueue_style(
        'typography/gotham-dev.css',
        'https://cloud.typography.com/6831932/6180392/css/fonts.css',
        false,
        null
    );

    wp_enqueue_style('ut/main.css', asset_path('styles/main.css'), false, null);
    wp_enqueue_script('ut/main.js', asset_path('scripts/main.js'), [], null, true);

    wp_enqueue_style('ut/header.css', asset_path('styles/header.css'), false, null);
    wp_enqueue_script('ut/header.js', asset_path('scripts/header.js'), [], null, true);

    wp_enqueue_style('ut/subsite-menu.css', asset_path('styles/subsite-menu.css'), false, null);
    wp_enqueue_script('ut/subsite-menu.js', asset_path('scripts/subsite-menu.js'), [], null, true);

    wp_enqueue_style(
        'slick/slick.min.css',
        'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css',
        false,
        null
    );
    wp_enqueue_style(
        'sage/slick-theme.min.css',
        'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css',
        false,
        null
    );

    wp_enqueue_style('ut/social-slider.css', asset_path('styles/social-slider.css'), false, null);
    wp_enqueue_script('ut/social-slider.js', asset_path('scripts/social-slider.js'), [], null, true);

    if (is_single() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}, 100);

add_filter('upload_dir', function ($upload) {

    if (is_multisite()) {
        $upload['baseurl'] = network_site_url() . 'wp-content/blogs.dir/' . get_current_blog_id() . '/files';
        $upload['url'] = $upload['baseurl'] . $upload['subdir'];
    }

    return $upload;
}, 100);

/**
 * Image Sizes
 */
add_image_size('post-thumbnail', 400, 400, true);
add_image_size('post-thumbnail-pre', 11, 11, true);
add_image_size('callout_image', 1000, 618, true);
add_image_size('callout_image_pre', 18, 11, true);
add_image_size('hero', 1364, 521, false);

/**
 *  Upscale smaller than ascribed dimension images
 */

add_filter('image_resize_dimensions', function ($default, $orig_w, $orig_h, $new_w, $new_h, $crop) {

    // let the wordpress default function handle this
    if (!$crop) :
        return null;
    endif;

    $aspect_ratio = $orig_w / $orig_h;
    $size_ratio = max($new_w / $orig_w, $new_h / $orig_h);

    $crop_w = round($new_w / $size_ratio);
    $crop_h = round($new_h / $size_ratio);

    $s_x = floor(($orig_w - $crop_w) / 2);
    $s_y = floor(($orig_h - $crop_h) / 2);

    return array( 0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h );
}, 10, 6);

/**
 * Theme setup
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from Soil when plugin is activated
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil-clean-up');
    add_theme_support('soil-jquery-cdn');
    add_theme_support('soil-nav-walker');
    add_theme_support('soil-nice-search');
    add_theme_support('soil-relative-urls');

    /**
     * Enable plugins to manage the document title
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Register navigation menus
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage')
    ]);

    /**
     * Enable post thumbnails
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable HTML5 markup support
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    /**
     * Enable selective refresh for widgets in customizer
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Use main stylesheet for visual editor
     * @see resources/assets/styles/layouts/_tinymce.scss
     */
    add_editor_style(asset_path('styles/main.css'));
}, 20);

/**
 * Register sidebars
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ];
    register_sidebar([
            'name' => __('Primary', 'sage'),
            'id' => 'sidebar-primary'
        ] + $config);
    register_sidebar([
            'name' => __('Footer', 'sage'),
            'id' => 'sidebar-footer'
        ] + $config);
});

/**
 * Updates the `$post` variable on each iteration of the loop.
 * Note: updated value is only available for subsequently loaded views, such as partials
 */
add_action('the_post', function ($post) {
    sage('blade')->share('post', $post);
});

/**
 * Setup Sage options
 */
add_action('after_setup_theme', function () {
    /**
     * Add JsonManifest to Sage container
     */
    sage()->singleton('sage.assets', function () {
        return new JsonManifest(config('assets.manifest'), config('assets.uri'));
    });

    /**
     * Add Blade to Sage container
     */
    sage()->singleton('sage.blade', function (Container $app) {
        $cachePath = config('view.compiled');
        if (!file_exists($cachePath)) {
            wp_mkdir_p($cachePath);
        }
        (new BladeProvider($app))->register();
        return new Blade($app['view']);
    });

    /**
     * Create @asset() Blade directive
     */
    sage('blade')->compiler()->directive('asset', function ($asset) {
        return "<?= " . __NAMESPACE__ . "\\asset_path({$asset}); ?>";
    });
});
