<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Volumes extends Controller
{

    public static function getVolumeClasses()
    {
        $classes = null;

        if (UT_LIBRARIES_ENTITY === 'volumes') :
            $classes = 'utk-entity-volumes ';

            if(get_post_type() === 'volume' && !is_tax()) :
                $classes .= ' utk-color-' . get_field('volume_color');
            elseif (get_post_type() === 'volume' && is_tax('volume_category')) :
                $term = get_query_var('volume_category');
                $classes .= self::getVolumeColorByTerm($term);
            else :
                //
            endif;
        endif;

        return $classes;
    }

    public static function getVolumeColorByTerm($term = null)
    {
        $color = null;

        if (have_rows('volume_categories', 'option')) :
            $featured_item = self::getFeaturedVolume($term);
            $color = 'utk-color-' . get_field('volume_color', $featured_item);
        endif;

        return $color;
    }

    public static function getFeaturedFeature()
    {
        $post = get_site_option('options_feature_featured_item');

        return $post;
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
