<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Formal extends Controller
{
    public static function getFormalPost($post_id = null, $post_type = null)
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
        $populate .= self::renderInner($data, $post_type);
        $populate .= '</div>';

        if (isset($_POST['security'])) :
            print $populate;
            wp_die();
        else :
            return $populate;
        endif;
    }

    private static function renderInner($data, $type)
    {
        switch ($type) :
            case 'competency':
                $inner = self::renderCompetencyInner($data);
                break;
            default:
                $inner = self::renderPostInner($data);
        endswitch;

        return $inner;
    }

    private static function renderPostInner($post, $content = null)
    {
        $content .= '<h1>' . $post['title'] . '</h1>';
        $content .= get_the_content($post['id']);

        return $content;
    }

    private static function renderCompetencyInner($post, $content = null)
    {
        $content .= '<h1>' . $post['title'] . '</h1>';
        $content .= $post['fields']['competency_description'] . '</h3>';

        return $content;
    }
}
