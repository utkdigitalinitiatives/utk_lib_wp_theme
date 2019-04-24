<div id="detach-sticky-top"></div>
@php
  $hoursbyLocation = get_option('options_site_hours_site_hours_on');
@endphp
@if ($hoursbyLocation)
  @include('partials.components.hours-by-location')
@endif
<div class="container page-body--container">
  @include('partials.components.breadcrumb')
  @include('partials.components.onesearch')
  <div class="page-body--flex">
    <main class="page-body--content">
      @include('partials.content-page')
    </main>
    <aside class="page-body--aside">
      @include('partials.sidebar')
    </aside>
  </div>
  <div id="detach-sticky-bottom"></div>
</div>
