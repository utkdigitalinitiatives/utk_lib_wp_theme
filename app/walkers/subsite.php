<?php

namespace App;

class PreprocessSubsite
{

    public static function prepareSubsiteMenu($post_id, $subsite_menu_slug)
    {

        global $wpdb;

        $prefix = $wpdb->prefix;

        $menu_term_results = $wpdb->get_col(
            "SELECT t.term_id
                FROM {$prefix}terms AS t
                LEFT JOIN {$prefix}term_taxonomy AS tt ON tt.term_id = t.term_id
                WHERE tt.taxonomy = 'nav_menu' and t.name = '{$subsite_menu_slug}'"
        );

        $menu_term_id = $menu_term_results[0];

        $menu_data = $wpdb->get_results(
            "SELECT menu.menu_id, menu.menu_parent, post.post_id FROM
                (SELECT p.ID as menu_id, pm.meta_value as post_id
                FROM {$prefix}posts AS p
                LEFT JOIN {$prefix}term_relationships AS tr ON tr.object_id = p.ID
                LEFT JOIN {$prefix}term_taxonomy AS tt ON tt.term_taxonomy_id = tr.term_taxonomy_id
                LEFT JOIN {$prefix}postmeta AS pm ON p.ID = pm.post_id
                WHERE p.post_type = 'nav_menu_item'
                AND pm.meta_key = '_menu_item_object_id'
                AND tt.term_id = {$menu_term_id}) as post
                LEFT JOIN
                (SELECT p.ID as menu_id, pm.meta_value as menu_parent
                FROM {$prefix}posts AS p
                LEFT JOIN {$prefix}term_relationships AS tr ON tr.object_id = p.ID
                LEFT JOIN {$prefix}term_taxonomy AS tt ON tt.term_taxonomy_id = tr.term_taxonomy_id
                LEFT JOIN {$prefix}postmeta AS pm ON p.ID = pm.post_id
                WHERE p.post_type = 'nav_menu_item'
                AND pm.meta_key = '_menu_item_menu_item_parent'
                AND tt.term_id = {$menu_term_id}) as menu
                ON post.menu_id = menu.menu_id
                GROUP BY post.post_id
                ORDER BY menu.menu_id ASC",
            ARRAY_A
        );

        $prepared_menu = [];

        $trace_id = $post_id;
        $trace_column = 'post_id';
        $trace_parent = -1;
        $trace_depth = 0; // set $tracedepth to break loop if it gets out of hand

        while ($trace_parent != 0 && $trace_depth < 3) {
            $trace_key = self::traceMenuAncestry($trace_id, $menu_data, $trace_column);

            if (isset($trace_key)) {
                array_unshift($prepared_menu, $menu_data[$trace_key]);
                $trace_parent = $menu_data[$trace_key]['menu_parent'];
                $trace_id = $trace_parent;
                $trace_column = 'menu_id';
            }

            $trace_depth++;
        }

        return $prepared_menu;
    }

    public static function traceMenuAncestry($id, $array, $column)
    {
        $key = array_search($id, array_column($array, $column));
        if (isset($key)) {
            return $key;
        } else {
            return null;
        }
    }
}
