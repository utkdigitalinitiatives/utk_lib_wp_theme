<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Volumes extends Controller
{

    public static function getVolumeClasses()
    {
        $classes = null;

        if (defined('PANTHEON_SITE_NAME')) :
            if (PANTHEON_SITE_NAME === 'utk-volumes') :
                $classes = 'utk-entity-volumes ';

                if (get_post_type() === 'volume' && !is_tax()) :
                    $classes .= ' utk-color-' . get_field('volume_color');
                elseif (get_post_type() === 'volume' && is_tax('volume_category')) :
                    $term = get_query_var('volume_category');
                    $classes .= self::getVolumeColorByTerm($term);
                elseif (get_post_type() === 'page' && is_front_page()) :
                    $item = Volumes::getFeaturedVolume('boundless');
                    $classes .= ' utk-color-' . get_field('volume_color', $item);
                else :
                    //
                endif;
            endif;
        endif;

        return $classes;
    }

    public static function getVolumeColorByTerm($term = null)
    {
        $color = null;

        $id = get_queried_object()->term_id;
        $term = get_term($id);
        $acf_id = $term->taxonomy . '_' . $id;

        $id = get_field('taxonomy_featured', $acf_id);
        $color = 'utk-color-' . get_field('volume_color', $id);

        return $color;
    }

    public static function getFeaturedFeature()
    {
        $post = get_site_option('options_feature_featured_item');

        return $post;
    }

    public static function getQuickPosts($type, $exclude = null, $count = 3)
    {

        $args = [
            'post_type'     => array($type),
            'post_status'   => 'publish',
            'posts_per_page'=> $count,
            'post__not_in' => array($exclude)
        ];

        $post_ids = [];

        $posts = new \WP_Query( $args );
        if ( $posts->have_posts() ) {
            while ( $posts->have_posts() ) {
                $posts->the_post();
                $post_ids[] = get_the_ID();
            }
        }

        return $post_ids;
    }

    public static function getFeaturedVolume($term = null)
    {
        $id = null;

        if ($term === null) {
            $term = get_query_var('volume_category');
        }
        while( have_rows('volume_categories', 'option') ): the_row();
            $category = get_sub_field('category');
            if ($category->slug === $term) :
                $id = get_sub_field('featured_item');
            endif;
        endwhile;

        return $id;
    }

    public static function getTermContent($term = null)
    {
        $id = null;

        if ($term === null) {
            $term = get_query_var('volume_category');
        }

        while( have_rows('volume_categories', 'option') ): the_row();
            $category = get_sub_field('category');
            if ($category->slug === $term) :
                $id = get_sub_field('content');
            endif;
        endwhile;

        return $id;
    }
}
