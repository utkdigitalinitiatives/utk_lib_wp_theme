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
    @if ($long_title != '')
      <a href="{{$siteURL}}" aria-label="@php echo $long_title; @endphp" role="heading" class="page-header--title-wrap page-header--title-wrap-long">
        <h2 class="page-header--title" id="subsite-title">
            @php echo $title @endphp
        </h2>
        <p id="subsite-long-title">@php echo $long_title; @endphp</p>
      </a>
    @else
      <a href="{{$siteURL}}" aria-label="@php echo $title; @endphp" role="heading" class="page-header--title-wrap">
        <h2 class="page-header--title" id="subsite-title">
            @php echo $title; @endphp
        </h2>
      </a>
    @endif
    <div id="page-header-subsite-menu">
      @include('partials.components.subsite-menu-dropdown')
    </div>
    <div id="page-header-subsite-menu-mobile-expand" class="page-header--current-page page-header--current-page-expand">
        <span class="icon-sort"></span>
        @php echo $post->post_title; @endphp
    </div>
    <div id="page-header-subsite-menu-mobile-close" class="page-header--current-page page-header--current-page-close">
        <span class="icon-left-open"></span>
        Back to Current Page
    </div>
    <div class="page-header--options">
      @include('partials.components.help')
      @include('partials.components.chat')
    </div>
  </div>
</div>
