<?php

namespace App;

/**
 * Theme customizer
 */
add_action('customize_register', function (\WP_Customize_Manager $wp_customize) {
    // Add postMessage support
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->selective_refresh->add_partial('blogname', [
        'selector' => '.brand',
        'render_callback' => function () {
            bloginfo('name');
        }
    ]);
});

/**
 * Customizer JS
 */
add_action('customize_preview_init', function () {
    wp_enqueue_script('sage/customizer.js', asset_path('scripts/customizer.js'), ['customize-preview'], null, true);
});

/*
 * little adjustments to accommodate the fixed wp admin toolbar
 */
add_action('wp_head', function () {
    if (is_admin_bar_showing()) {
        echo "
<style type='text/css' media='screen'> 
    html {
        margin-top: 129px !important;
        font-size: 18px
    }
    @media (min-width: 768px) and (max-width: 991px) {
        html {
            margin-top: 82px !important;
        }
    }
    @media (max-width:767px){ 
        html {
            margin-top: 66px !important;
        }
    }
</style>
";
    } else {
        return false;
    }
}, 20);
