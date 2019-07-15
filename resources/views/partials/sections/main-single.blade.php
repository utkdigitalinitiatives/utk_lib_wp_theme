<div id="detach-sticky-top"></div>
@php
  $hoursbyLocation = get_option('options_site_hours_site_hours_on');
@endphp
@if ($hoursbyLocation)
  @include('partials.components.hours-by-location')
@endif
@include('partials.components.breadcrumb')
<div class="container page-body--container">
  @include('partials.components.notice')
  <div class="page-body--flex">
    <aside class="page-body--aside">
      @include('partials.sidebar-single')
    </aside>
    <main class="page-body--content">
      @include('partials.components.google-custom-search')
      @include('partials.components.panel-mini')
      @include('partials.content-'.get_post_type())
    </main>
  </div>
  <div id="detach-sticky-bottom"></div>
</div>
