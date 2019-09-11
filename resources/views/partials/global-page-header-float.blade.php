@php

    /*
     * get long title for subsite if available.
     */

    $long_title = get_theme_mod('title_tagline__long_title');

    if ($subsite) :
        $title = $subsite->blogname;
        $siteURL = $subsite->siteurl;
    else :
        $title = get_option('blogname');
        $siteURL = "/";
    endif;

@endphp

<div id="page-header-trigger" class="page-header--float">
  <div class="container">
    <div id="page-header-subsite-menu">
      @include('partials.components.subsite-menu-dropdown')
    </div>
    @if ($long_title != '')
      <a href="{{$siteURL}}"
         role="heading"
         aria-label="@php echo $long_title; @endphp"
         aria-level="2"
         class="page-header--title-wrap page-header--title-wrap-long">
        <h2 class="page-header--title" id="subsite-title">
            @php echo $title @endphp
        </h2>
        <span id="subsite-long-title">@php echo $long_title; @endphp</span>
      </a>
    @else
      <a href="{{$siteURL}}"
         role="heading"
         aria-label="@php echo $title; @endphp"
         aria-level="2"
         class="page-header--title-wrap">
        <h2 class="page-header--title" id="subsite-title">
            @php echo $title; @endphp
        </h2>
      </a>
    @endif
    <div class="page-header--current-page">
        @if(is_page())
          @php echo $post->post_title; @endphp
        @elseif(is_archive())
          @php echo post_type_archive_title( '', false ); @endphp
        @endif
    </div>
    <div id="page-header-subsite-menu-mobile-expand" class="page-header--current-page-expand">
        <span class="icon-menu"></span>
    </div>
    <div id="page-header-subsite-menu-mobile-close" class="page-header--current-page-close">
        <span class="icon-cancel"></span>
    </div>
    <div class="page-header--options">
      {{--@include('partials.components.help')--}}
      {{--@include('partials.components.give')--}}
      @include('partials.components.chat')
    </div>
  </div>
</div>
