<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Volumes extends Controller
{

    public static function getVolumeColor()
    {
        $color = null;

        if (UT_LIBRARIES_ENTITY === 'volumes') :
            if(get_post_type() === 'volume' && !is_tax()) :
                $color = 'utk-color-' . get_field('volume_color');
            elseif (get_post_type() === 'volume' && is_tax('volume_category')) :
                $term = get_query_var('volume_category');
                $color = self::getVolumeColorByTerm($term);
            else :
                //
            endif;
        endif;

        return $color;
    }

    public static function getVolumeColorByTerm($term = null)
    {
        $color = null;

        if (have_rows('volume_categories', 'option')) :
            $featured_item = self::getFeaturedItem($term);
            $color = 'utk-color-' . get_field('volume_color', $featured_item);
        endif;

        return $color;
    }

    public static function getFeaturedItem($term = null)
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
}
