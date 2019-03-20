<?php

namespace App;

/**
 * input all verbose customizer actions here
 **/

add_action('customize_register', function (\WP_Customize_Manager $wp_customize) {

    $wp_customize->add_setting('title_tagline__long_title');
    $wp_customize->add_control('title_tagline__long_title', array(
        'label'    => __('Long Site Title (Optional)', 'title_tagline'),
        'section'  => 'title_tagline',
        'settings' => 'title_tagline__long_title',
        'type'     => 'textarea'
    ));
});
