@php

    if (function_exists('switch_to_blog')) {

        // if on wwww multisite env
        $blog_id = 86; // assets blog_id to grab global menu
        $subsite_menu_slug = 'footer'; // get proper menu by slug

        // switch to assets
        switch_to_blog($blog_id);

        $defaults = [
         'menu'         => $subsite_menu_slug,
         'walker'       => new \App\WordPressBootstrapNavwalker(),
         'items_wrap'   => '<ul id="%1$s" class="%2$s" role="menu">%3$s</ul>',
        ];

        wp_nav_menu($defaults);

        // switch back
        restore_current_blog();

    } else {

        // else do wp-json api pull

        /*
        $defaults = [
         'menu'         => $subsite_menu_slug,
         'walker'       => new \App\WordPressBootstrapNavwalkerDrawer(),
        ];

        wp_nav_menu($defaults);
        */

    }

@endphp