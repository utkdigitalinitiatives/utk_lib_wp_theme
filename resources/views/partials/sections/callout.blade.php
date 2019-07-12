@php
  $fields = UTKLibrary\Library\Models\Callout::render_callout();
  $current = get_current_blog_id();
  $hide_callout = [
    30
  ];
@endphp
@if($fields && !in_array($current, $hide_callout))
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

          @default
            @include('partials.components.callout-default')

        @endswitch
      </div>
    </div>
  </section>
@elseif($current === 30)
  <section class="utk-section section-callout section-callout--{{$type}}">
    <div class="container">
      <div id="utk-exhibits"></div>
    </div>
  </section>
@endif
