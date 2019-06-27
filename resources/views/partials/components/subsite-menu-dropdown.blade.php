@php

  $locations = get_nav_menu_locations();
  $subsite_menu = wp_get_nav_menu_object($locations['sidebar_subsite']);

$defaults = [
 'menu'         => $subsite_menu->slug,
 'fallback_cb' => 'WordPressBootstrapNavwalker::fallback',
 'walker'       => new \App\WordPressBootstrapNavwalker(),
];

@endphp

<a id="menu-subsite-dropdown-trigger" class="menu-subsite-trigger" href="#" role="menuitem">
  <span class="icon-menu"></span>
</a>
<div id="menu-subsite-dropdown-wrap">
@php wp_nav_menu($defaults); @endphp
</div>
