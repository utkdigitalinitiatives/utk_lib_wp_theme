@php

    if (function_exists('get_blog_details')) {

      $subsite = get_blog_details();

    } else {

      $subsite = null;

    }

    $hero = get_field('hero_image');
    $size = 'hero';

@endphp
<div class="page-header page-header-hero">
  @include('partials.global-page-header-float')
  @if($hero)
    <div class="page-header-hero--background">
      @php
        echo wp_get_attachment_image($hero, $size);
      @endphp
    </div>
    <div class="page-header-hero--overlay"></div>
  @endif
</div>
