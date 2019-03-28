<?php

namespace App;

class SubsiteBreadcumb
{

    public static function breadcrumbInline($theme_location = 'sidebar_subsite')
    {
        $locations = get_nav_menu_locations();
        $subsite_menu = wp_get_nav_menu_object($locations[$theme_location]);

        if (function_exists('get_blog_details')) :
            $details = get_blog_details();
        else :
            $details = null;
        endif;

        if ($subsite_menu) :
            $items = wp_get_nav_menu_items($subsite_menu);
            _wp_menu_item_classes_by_context($items);

            self::breadcrumbRender($details, $items);
        else :
            self::breadcrumbRender($details, null);
        endif;

        return;
    }

    public static function breadcrumbGetTrunk($details)
    {
        return [
            '<a href="' . network_site_url() .'">Libraries</a>',
            '<a href="' . $details->siteurl . '">' . $details->blogname  .'</a>'
        ];
    }

    public static function breadcrumbRender($details, $items)
    {
        $crumbs = self::breadcrumbGetTrunk($details);

        foreach ($items as $item) :
            if ($item->current_item_ancestor) :
                $crumbs[] = "<a href=\"{$item->url}\" title=\"{$item->title}\">{$item->title}</a>";
            elseif ($item->current) :
                $crumbs[] = "<span class='current-menu-item'>{$item->title}</span>";
            endif;
        endforeach;

        echo implode('<span class="icon-angle-right"></span>', $crumbs);
    }
}
