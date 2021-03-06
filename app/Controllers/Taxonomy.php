<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Taxonomy extends Controller
{

    public static function getTaxonomyTerms($name = 'default', $content = null)
    {
        return get_terms([
            'taxonomy' => $name,
            'hide_empty' => false,
            'orderby' => 'meta_value_num',
            'order' => 'ASC',
            'meta_query' => [
                [
                    'key' => 'taxonomy_weight',
                    'type' => 'NUMERIC',
                ]
            ],
        ]);
    }

    public static function getTaxonomyListing($name = 'default', $content = null)
    {
        $terms = self::getTaxonomyTerms($name);

        $content .= '<div class="utk-taxonomy">';

        foreach ($terms as $term) :
            $content .= self::getTaxonomyTerm($term, $name);
        endforeach;

        $content .= '<div>';

        return $content;
    }

    public static function getTaxonomyTerm($term, $taxonomy, $term_content = null)
    {

        $term_svg = get_term_meta($term->term_id, 'taxonomy_svg', 1);
        $term_color = get_term_meta($term->term_id, 'taxonomy_color', 1);

        if ($term_color === 'default') :
            $term_color = '58595b';
        endif;

        $term_svg_wrap = '<figure class="utk-svg-wrap" style="fill: #' . $term_color . ';">' . $term_svg . '</figure>';

        $term_content .= '<div class="utk-taxonomy--term">';
            $term_content .= $term_svg_wrap;
            $term_content .= '<h2 style="border-color:#' . $term_color .'!important;">' . $term->name . '</h2>';
            $term_content .= '<div class="utk-taxonomy--term--description">';
                $term_content .= '<p>' . $term->description . '</p>';
                $term_content .= '</a>';
            $term_content .= '</div>';
        $term_content .= '</div>';

        return $term_content;
    }

    public static function getPostsByTerm($term_id, $taxonomy)
    {
        $args = [
            'post_type' => get_field('taxonomy_post_type'),
            'numberposts' => -1,
            'orderby' => 'name',
            'order' => 'ASC',
            'tax_query' => array(
                array(
                    'taxonomy' => $taxonomy,
                    'field' => 'id',
                    'terms' => $term_id, // Where term_id of Term 1 is "1".
                    'include_children' => false
                )
            )
        ];

        $posts_array = get_posts($args);

        return self::getPostLink($posts_array);
    }

    public static function getPostLink($posts, $links = null)
    {
        foreach ($posts as $post) :
            $links .= '<li>';
            $links .= '<a href="' . get_the_permalink($post->ID) .'">' . $post->post_title . '</a>';
            $links .= '</li>';
        endforeach;

        return $links;
    }
}
