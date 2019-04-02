<?php

namespace App;

/*
 * Add custom FacetWP functions below
 */

add_filter('facetwp_index_row', function ($params, $class) {
    if ('post_month_year' == $params['facet_name']) {
        $raw_value = $params['facet_value'];
        $params['facet_value'] = date('Y-m', strtotime($raw_value)); // "2019-04" for the permalink
        $params['facet_display_value'] = date('F Y', strtotime($raw_value)); // "April 2019" for the display value
    }
    return $params;
}, 10, 2);

add_filter('facetwp_facet_orderby', function ($orderby, $facet) {
    if ('post_month_year' == $facet['name']) {
        $orderby = 'f.facet_value DESC';
    }
    return $orderby;
}, 10, 2);
