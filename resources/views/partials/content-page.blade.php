@php
    $hoursbyLocation = get_option('options_site_hours_site_hours_on');
@endphp
@if ($hoursbyLocation)
    @include('partials.components.hours-by-location')
@endif
<div class="page-body--content--inner">
  @if(get_the_title())
    <div class="page-body--content--title">
      <h1>@php echo get_the_title(); @endphp</h1>
    </div>
  @endif
  <div class="page-body--content--body">
    @php the_content() @endphp
  </div>
</div>
