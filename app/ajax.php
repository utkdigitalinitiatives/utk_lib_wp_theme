<?php

namespace App\Controllers;

// formal post populate
add_action('wp_ajax_get_formal_post', ['Formal', 'get_formal_post']);
add_action('wp_ajax_nopriv_get_formal_post', ['Formal', 'get_formal_post']);
