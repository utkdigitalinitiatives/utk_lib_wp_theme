@php

  $locations = get_nav_menu_locations();
  $subsite_menu = wp_get_nav_menu_object($locations['sidebar_subsite']);

$defaults = [
 'menu'         => $subsite_menu->name,
 'fallback_cb' => 'WordPressBootstrapNavwalker::fallback',
 'walker'       => new \App\WordPressBootstrapNavwalker(),
];

@endphp

<a id="menu-subsite-trigger" class="menu-subsite-trigger" href="#" role="menuitem">
  @php echo get_the_title(); @endphp <span class="icon-angle-down"></span>
</a>
@php wp_nav_menu($defaults); @endphp
