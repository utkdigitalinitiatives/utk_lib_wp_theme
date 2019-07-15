<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class App extends Controller
{

    public function siteName()
    {
        return get_bloginfo('name');
    }

    public static function title()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return __('Latest Posts', 'sage');
        }
        if (is_archive()) {
            return get_the_archive_title();
        }
        if (is_search()) {
            return sprintf(__('Search Results for %s', 'sage'), get_search_query());
        }
        if (is_404()) {
            return __('Not Found', 'sage');
        }
        return get_the_title();
    }

    /*
     * calculate read time like medium.com based on 125 words per minute.
     */

    public static function estimateReadTime($content)
    {

        $wordsPerMinute = 125;

        $words = str_word_count(strip_tags($content));
        $minutes = floor($words / $wordsPerMinute);
        $seconds = floor($words % $wordsPerMinute / ($wordsPerMinute / 60));
        $estimate = ($seconds > 30 ? $minutes + 1 : $minutes);

        return $estimate;
    }

    /*
     * calculate read time like medium.com based on 125 words per minute.
     */

    public static function renderFacets()
    {
        $enabled = get_field('site_facetwp_site_facetwp_enable', 'option');

        echo facetwp_display('facet', 'employment_department');

        return;
    }

    /*
     * get LibChat hash, using default of override not set
     */

    public static function getLibChatHash()
    {
        $hash = null;

        // ut libraries 2019 - subheader global
        $defaultHash = '8a9fa354ff9adc8c085107bc41e587c8';

        // get site options for current site
        $override = get_field('site_libchat_site_libchat_override', 'option');
        $updateHash = get_field('site_libchat_site_libchat_hash', 'option');

        // set hash
        if ($override === true && $updateHash != '') {
            $hash = $updateHash;
        } else {
            $hash = $defaultHash;
        }

        return $hash;
    }

    public static function renderEndDots()
    {
        return '<span class="utk-end">
                    <span class="utk-end--dot"></span>
                    <span class="utk-end--dot"></span>
                    <span class="utk-end--dot"></span>
                </span>
                ';
    }

    public static function utkGetSingleAside($post_id, $count)
    {

        $terms = get_the_terms($post_id, 'category');

        if (is_array($terms)) :
            return self::utkGetRelatedPosts($post_id, $count);
        else :
            return self::utkGetRecentPosts($post_id, $count);
        endif;
    }

    public static function utkGetRelatedPosts($post_id, $count)
    {

        $terms = get_the_terms($post_id, 'category');

        if (empty($terms)) {
            $terms = array();
        }

        $term_list = wp_list_pluck($terms, 'slug');

        $this_year = date("Y");
        $last_year = $this_year - 1;

        $related_args = array(
            'post_type' => 'post',
            'posts_per_page' => $count,
            'post_status' => 'publish',
            'post__not_in' => array( $post_id ),
            'orderby' => 'rand',
            'date_query' => array(
                'relation' => 'OR',
                array('year' => $this_year),
                array('year' => $last_year)
            ),
            'tax_query' => array(
                array(
                    'taxonomy' => 'category',
                    'field' => 'slug',
                    'terms' => $term_list
                )
            )
        );

        return new \WP_Query($related_args);
    }

    public static function utkGetRecentPosts($post_id, $count)
    {

        $related_args = array(
            'post_type' => 'post',
            'posts_per_page' => $count,
            'post_status' => 'publish',
            'post__not_in' => array( $post_id ),
            'orderby' => 'post_date',
            'order' => 'DESC'
        );

        return new \WP_Query($related_args);
    }
}
