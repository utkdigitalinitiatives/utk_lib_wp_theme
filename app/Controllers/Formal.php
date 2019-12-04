<?php

namespace App\Controllers;

use function App\template;
use Sober\Controller\Controller;
use UTKLibrary\Library\Models\Space;

class Formal extends Controller
{

    public static function getFormalHeader($post_id, $heading = false)
    {

        $content_post = get_post($post_id);

        $title = $content_post->post_title;

        if (get_post_type() === 'space' && !is_archive()) :
            $location_link = '<svg id="utk_svg_space_space"
     data-name="utk_svg_space_space"
     xmlns="http://www.w3.org/2000/svg"
     viewBox="0 0 80.116 73.463">
    <title>space room</title>
    <polygon points="0 51.686 0 22.334 37.324 44.735 37.324 73.463 0 51.686"/>
    <polygon points="42.793 44.735 80.116 22.332 80.116 51.686 42.793 73.463 42.793 44.735"/>
    <polygon points="42.727 28.725 42.727 0 76.714 19.828 52.308 34.477 42.727 28.725"/>
    <polygon points="3.404 19.828 37.387 0 37.387 28.725 27.809 34.477 3.404 19.828"/>
</svg>' . Space::getSpaceLocations($post_id, true);
            $location_type = '<svg id="utk_svg_space_space"
     data-name="utk_svg_space_space"
     xmlns="http://www.w3.org/2000/svg"
     viewBox="0 0 80.116 73.463">
    <title>space room</title>
    <polygon points="0 51.686 0 22.334 37.324 44.735 37.324 73.463 0 51.686"/>
    <polygon points="42.793 44.735 80.116 22.332 80.116 51.686 42.793 73.463 42.793 44.735"/>
    <polygon points="42.727 28.725 42.727 0 76.714 19.828 52.308 34.477 42.727 28.725"/>
    <polygon points="3.404 19.828 37.387 0 37.387 28.725 27.809 34.477 3.404 19.828"/>
</svg>' . Space::getSpaceType($post_id);
            $content = $location_link . $location_type;
        else:
            $content = $content_post->post_content;
            $content = apply_filters('the_content', $content);
            $content = str_replace(']]>', ']]&gt;', $content);
        endif;

        if (has_post_thumbnail($post_id)) :
            $post_thumbnail = get_the_post_thumbnail(null, 'gr_thumb');
        else :
            $post_thumbnail = null;
        endif;

        if ($heading === false) :
            $render_header = ' <span class="utk-heading-1" role="heading" aria-level="1">' . $title . '</span>';
        else :
            $render_header = ' <h1 class="utk-heading-1" role="heading" aria-level="1">' . $title . '</h1>';
        endif;

        $header = '
        <div class="page-body--formal-header page-body--formal-header-' . $post_id . '">
            <div class="page-body--formal-header--context">
                <div class="container">
                    <div class="page-body--content--title">' . $render_header . '</div>
                    <div class="page-body--content--body">' . $content . '</div>
                </div>
            </div>
            <div class="utk-formal--header--background">' . $post_thumbnail . '</div>
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

        $populate = '<div class="article--populate--inner article--populate--inner-' . $post_type . '">';
        $populate .= self::renderInner($data, $post_type);
        $populate .= '</div>';

        $populate .= '<button class="utk-modal-close"></button>';

        if (isset($_POST['security'])) :
            echo $populate;
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

        if ($term_color === 'default') :
            $term_color = '58595b';
        endif;

        $term_svg_wrap = '<figure class="utk-svg-wrap" style="fill: #' . $term_color . ';">' . $term_svg . '</figure>';

        $content .= $term_svg_wrap;
        $content .= '<div class="article--competency--wrap">';
        $content .= '<h1 style="color: #' . $term_color . ';">' . $post['title'] . '</h1>';
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
        $content = template('partials.content-space-modal', ['data' => $post]);

        return $content;
    }
}
