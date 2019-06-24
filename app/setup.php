<?php

namespace App;

use App\Controllers\App;
use Roots\Sage\Container;
use Roots\Sage\Assets\JsonManifest;
use Roots\Sage\Template\Blade;
use Roots\Sage\Template\BladeProvider;

/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {

    wp_enqueue_style('ut/main.css', asset_path('styles/main.css'), false, null);

    wp_enqueue_style('ut/header.css', asset_path('styles/header.css'), false, null);
    wp_enqueue_script('ut/header.js', asset_path('scripts/header.js'), [], null, true);

    if (is_main_site() && is_front_page()) :
        wp_enqueue_style('ut/panel.css', asset_path('styles/panel.css'), false, null);
        wp_enqueue_script('ut/panel.js', asset_path('scripts/panel.js'), [], null, true);
    else :
        wp_enqueue_style('ut/subsite-menu.css', asset_path('styles/subsite-menu.css'), false, null);
        wp_enqueue_script('ut/subsite-menu.js', asset_path('scripts/subsite-menu.js'), [], null, true);

        wp_enqueue_script(
            'ut/libcal',
            'https://v2.libanswers.com/load_chat.php?hash=' . App::getLibChatHash(),
            [],
            null,
            true
        );
    endif;

    wp_enqueue_script('ut/main.js', asset_path('scripts/main.js'), [], null, true);

    wp_enqueue_style('ut/social-slider.css', asset_path('styles/social-slider.css'), false, null);
    wp_enqueue_script('ut/social-slider.js', asset_path('scripts/social-slider.js'), [], null, true);

    if (get_current_blog_id() === 91 && isset($_GET['gcs'])) {
        wp_add_inline_script(
            'ut/main.js',
            "(function() {
                var cx = '001438504504481982651:oyb3rrwbbbo';
                var gcse = document.createElement('script');
                gcse.type = 'text/javascript';
                gcse.async = true;
                gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(gcse, s);
            })();",
            'before'
        );
    }

    if (is_single() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}, 100);


add_action('admin_enqueue_scripts', function () {

    wp_enqueue_style('ut/admin.css', asset_path('styles/admin.css'), false, null);

    wp_enqueue_style('ut/accordion.css', asset_path('styles/accordion.css'), false, null);
    wp_enqueue_script('ut/accordion.js', asset_path('scripts/accordion.js'), [], null, true);
});

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
add_image_size('post-thumbnail', 521, 521, true);
add_image_size('card_image', 521, 322, true);
add_image_size('callout_image', 843, 521, true);
add_image_size('hero_image', 1364, 843, false);
add_image_size('vertical_image', 521, 843, true);
add_image_size('directory_image', 322, 199, false);

// common aspect ratios for lazyloads
add_image_size('preload_square', 18, 18, true);
add_image_size('preload_gr_horz', 29, 18, true);
add_image_size('preload_gr_vert', 18, 29, true);

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
 * load favicons
 */

add_action('wp_head', function () {
    echo '<link rel="apple-touch-icon" sizes="180x180" href="'. asset_path('images/favicon/apple-touch-icon.png') .'">';
    echo '<link rel="icon" type="image/png" sizes="32x32" href="'. asset_path('images/favicon/favicon-32x32.png') .'">';
    echo '<link rel="icon" type="image/png" sizes="16x16" href="'. asset_path('images/favicon/favicon-16x16.png') .'">';
    echo '<link rel="manifest" href="'. asset_path('images/favicon/site.webmanifest') . '">';
    echo '<link rel="mask-icon" href="'. asset_path('images/favicon/safari-pinned-tab.svg') . '" color="#ff8200">';
    echo '<meta name="msapplication-TileColor" content="#ffffff">';
    echo '<meta name="theme-color" content="#ffffff">';
});

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
