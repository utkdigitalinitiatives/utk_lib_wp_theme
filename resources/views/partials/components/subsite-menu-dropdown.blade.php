@php

  $subsite_menu_slug = 'subsite'; /* this must remain static */

  $defaults = [
   'menu'         => $subsite_menu_slug,
    'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
   'walker'       => new \App\WP_Bootstrap_Navwalker(),
  ];

@endphp

<a id="menu-subsite-trigger" class="menu-subsite-trigger" href="#" role="menuitem">
  @php echo get_the_title(); @endphp <span class="icon-angle-down"></span>
</a>
@php wp_nav_menu($defaults); @endphp
