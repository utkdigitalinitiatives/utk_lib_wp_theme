@php
  $callout = UTKLibrary\Library\Models\Callout::render_callout();
@endphp

@if($callout)
  @php
    $type = $callout['fields']['callout_type'];
  @endphp
  <section class="utk-section section-callout section-callout--{{$type}}">
    <div class="container">
      <div class="utk-callout">
        @if ($type == 'background_video')
            @include('partials.components.callout-video-background')
        @endif
      </div>
    </div>
  </section>
@endif
