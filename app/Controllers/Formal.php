<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Formal extends Controller
{
    public static function get_formal_post($post_id = null, $post_type = null)
    {
        if (isset($_POST['security'])) :
            check_ajax_referer('utk_nonce', 'security');
            $post_id = $_POST['id'];
            $post_type = $_POST['type'];

        endif;

        $data['id'] = $post_id;
        $data['title'] = get_the_title($post_id);
        $data['fields'] = get_fields($post_id);

        $populate = '<div class="article--populate--inner">';
        $populate .= self::render_inner($data, $post_type);
        $populate .= '</div>';

        if (isset($_POST['security'])) :
            print $populate;
            wp_die();

        else :
            return $populate;

        endif;
    }

    static function render_inner($data, $type)
    {
        switch ($type):
            case 'competency':
                $inner = self::render_competency_inner($data);
                break;
            default:
                $inner = self::render_post_inner($data);
        endswitch;

        return $inner;
    }

    static function render_post_inner($post, $content = null)
    {
        $content .= '<h1>' . $post['title'] .'</h1>';
        $content .= get_the_content($post['id']);

        return $content;
    }

    static function render_competency_inner($post, $content = null)
    {
        $content .= '<h1>' . $post['title'] .'</h1>';
        $content .= $post['fields']['competency_description'] .'</h3>';

        return $content;
    }
}
