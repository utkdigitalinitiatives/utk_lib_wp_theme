<?php

namespace App\Controllers;

// formal post populate
add_action('wp_ajax_getFormalPost', ['Formal', 'getFormalPost']);
add_action('wp_ajax_nopriv_getFormalPost', ['Formal', 'getFormalPost']);
