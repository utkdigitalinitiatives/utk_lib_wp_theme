@php

  $blog_id = 86; // assets blog_id to grab global menu
  $subsite_menu_slug = 'university'; // get proper menu by slug

  // switch to assets
  switch_to_blog($blog_id);

    $defaults = [
     'menu'         => $subsite_menu_slug,
     'walker'       => new \App\WordPressBootstrapNavwalker(),
    ];

  wp_nav_menu($defaults);

  // switch back
  restore_current_blog();

@endphp
