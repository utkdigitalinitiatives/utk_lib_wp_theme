<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Formal extends Controller
{

    public static function getFormalHeader($post_id)
    {

        $content_post = get_post($post_id);

        $title = $content_post->post_title;
        $content = $content_post->post_content;
        $content = apply_filters('the_content', $content);
        $content = str_replace(']]>', ']]&gt;', $content);

        $header = '
        <div class="page-body--formal-header page-body--formal-header-' . $post_id . '">
            <div class="page-body--content--title">
              <span class="utk-heading-1" role="heading" aria-level="1">' . $title .'</span>
            </div>
            <div class="page-body--content--body">' . $content . '</div>
        </div>';

        return $header;
    }

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

        $populate = '<div class="article--populate--inner article--populate--inner-' . $post_type .'">';
        $populate .= self::renderInner($data, $post_type);
        $populate .= '</div>';

        $populate .= '<button class="utk-modal-close"></button>';

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
            case 'space':
                $inner = self::renderSpaceInner($data);
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
        $model = wp_get_post_terms($post['id'], 'competency_models', array("fields" => "all"));

        $term_id = $model[0]->term_id;

        $term_svg = get_term_meta($term_id, 'taxonomy_svg', 1);
        $term_color = get_term_meta($term_id, 'taxonomy_color', 1);

        if ($term_color === 'default')
            $term_color = '58595b';

        $term_svg_wrap = '<figure class="utk-svg-wrap" style="fill: #' . $term_color . ';">' . $term_svg . '</figure>';

        $content .= $term_svg_wrap;
        $content .= '<div class="article--competency--wrap">';
        $content .= '<h1 style="color: #' . $term_color .';">' . $post['title'] . '</h1>';
        $content .= '<div class="article--competency--definition">';
        $content .= '<h2>Definition</h2>';
        $content .= $post['fields']['competency_description'];
        $content .= '</div>';

        if (isset($post['fields']['competency_examples'])) :
            $examples = $post['fields']['competency_examples'];
            if (count($examples) > 0) :
                $content .= '<div class="article--competency--examples">';
                $content .= '<h2>Examples</h2>';
                $content .= '<ul>';
                foreach ($examples as $example) :
                    $content .= '<li>' . $example['competency_examples_name'] . '</li>';
                endforeach;
                $content .= '</ul>';
                $content .= '</div>';
            endif;
        endif;

        $content .= '</div>';

        return $content;
    }

    private static function renderSpaceInner($post, $content = null)
    {
        $content .= '<h1>' . $post['title'] . '</h1>';
        $content .= get_the_content($post['id']);

        return $content;
    }
}
