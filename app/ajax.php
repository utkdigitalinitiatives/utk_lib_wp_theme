<?php

namespace App\Controllers;

// competency
add_action('wp_ajax_get_competency_post', ['Formal', 'get_competency_post']);
add_action('wp_ajax_nopriv_get_competency_post', ['Formal', 'get_competency_post']);
