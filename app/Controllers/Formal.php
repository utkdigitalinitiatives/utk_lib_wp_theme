<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Formal extends Controller
{
    function get_competency_post()
    {
        check_ajax_referer('utk_nonce', 'security');

        $post['title'] = get_the_title($_POST['id']);
        $post['fields'] = get_fields($_POST['id']);

        $populate = '<div class="article--populate--inner">';
        $populate .= '<h3>' . $post['title'] . '</h3>';
        $populate .= $post['fields']['competency_description'];
        $populate .= '</div>';

        print $populate;

        wp_die();
    }
}
