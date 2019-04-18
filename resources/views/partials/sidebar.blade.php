@php
    $hoursbyLocation = get_option('options_site_hours_site_hours_on');
@endphp
@if ($hoursbyLocation)
    @include('partials.components.hours-by-location')
@endif
<div class="aside-subsite-menu preload">
  @include('partials.components.subsite-menu-sidebar')
</div>
<div class="aside-subsite-custom-widgets">
  @php
    dynamic_sidebar('sidebar-primary')
  @endphp
</div>
