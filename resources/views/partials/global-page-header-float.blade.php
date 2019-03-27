@php

  /*
   * get long title for subsite if available.
   */

  $long_title = get_theme_mod('title_tagline__long_title');

@endphp

<div id="page-header-trigger" class="page-header--float">
  <div class="container">
    @if ($long_title != '')
      <a href="#" aria-label="@php echo $long_title; @endphp" role="heading" class="page-header--title-wrap page-header--title-wrap-long">
        <h2 class="page-header--title" id="subsite-title">@php echo $subsite->blogname; @endphp</h2>
        <p id="subsite-long-title">@php echo $long_title; @endphp</p>
      </a>
    @else
      <a href="#" aria-label="@php echo $long_title; @endphp" role="heading" class="page-header--title-wrap">
        <h2 class="page-header--title" id="subsite-title">@php echo $subsite->blogname; @endphp</h2>
      </a>
    @endif
    <div id="page-header-subsite-menu">
      @include('partials.components.subsite-menu-dropdown')
    </div>
    <div class="page-header--options">
      @include('partials.components.help')
      @include('partials.components.chat')
    </div>
  </div>
</div>
