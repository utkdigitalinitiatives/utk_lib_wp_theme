@php
  $fields = UTKLibrary\Library\Models\Callout::render_callout();
@endphp
@if($fields)
  @php
    $type = $fields['fields']['callout_type'];
  @endphp
  <section class="utk-section section-callout section-callout--{{$type}}">
    <div class="container">
      <div class="utk-callout">
        @switch($type)

          @case('image-text')
            @include('partials.components.callout-image-text')
            @break

          @case('image-background')
            @include('partials.components.callout-image-background')
            @break

          @case('image-gallery')
            @include('partials.components.callout-image-gallery')
            @break

          @case('image-slider')
            @include('partials.components.callout-image-slider')
            @break

          @case('video-text')
            @include('partials.components.callout-video-text')
            @break

          @case('video-background')
            @include('partials.components.callout-video-background')
            @break

          @default
            @include('partials.components.callout-default')

        @endswitch
      </div>
    </div>
  </section>
@endif
