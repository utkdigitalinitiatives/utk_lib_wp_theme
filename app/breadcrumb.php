<?php

namespace App;

class Subsite_Breadcumb
{

    public static function breadcrumb_inline($theme_location = 'subsite')
    {

        $details = get_blog_details();

        $items = wp_get_nav_menu_items($theme_location);
        _wp_menu_item_classes_by_context($items); // Set up the class variables, including current-classes

        $crumbs = [
            '<a href="' . network_site_url() .'">Libraries</a>',
            '<a href="' . $details->siteurl . '">' . $details->blogname  .'</a>'
        ];

        foreach ($items as $item) {
            if ($item->current_item_ancestor) {
                $crumbs[] = "<a href=\"{$item->url}\" title=\"{$item->title}\">{$item->title}</a>";
            } elseif ($item->current) {
                $crumbs[] = "<span class='current-menu-item'>{$item->title}</span>";
            }
        }

        echo implode('<span class="icon-angle-right"></span>', $crumbs);
    }
}
