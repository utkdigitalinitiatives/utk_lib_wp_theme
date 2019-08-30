<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Taxonomy extends Controller
{

    public static function getTaxonomyListing($name = 'default', $content = null)
    {
        $terms = get_terms([
            'taxonomy' => $name,
            'hide_empty' => false,
        ]);

        $content .= '<div class="utk-taxonomy>';

        foreach ($terms as $term) :
            $content .= self::getTaxonomyTerm($term);
        endforeach;

        $content .= '<div>';

        return $content;
    }

    public static function getTaxonomyTerm($term, $term_content = null)
    {
        $term_posts = self::getPostsByTerm($term->term_id);

        $term_content .= '<div class="utk-taxonomy--term">';
            $term_content .= '<h2>' . $term->name . '</h2>';
            $term_content .= '<div class="utk-taxonomy--term--description">';
                $term_content .= '<p>' . $term->description . '</p>';
            $term_content .= '</div>';
            $term_content .= '<div class="utk-taxonomy--term--posts">';
                $term_content .= '<h3>Competencies</h3>';
                $term_content .= $term_posts;
            $term_content .= '</div>';
        $term_content .= '</div>';

        return $term_content;
    }

    public static function getPostsByTerm($term_id)
    {
        return $term_id;
    }

}
