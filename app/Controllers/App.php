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

}
