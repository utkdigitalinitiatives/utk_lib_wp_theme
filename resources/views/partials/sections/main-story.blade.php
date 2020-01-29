@php

  Namespace App\Controllers;

  $formal_type = get_field('formal_type', null, false);

  if (strtolower($formal_type) === 'page') :
      $formal_header = get_field('formal_header', null, false);
  else :
      $formal_header = get_the_ID();
  endif;

  $storyHeader = \App\asset_path('images/chimney-top-II-fires-background_25effa54.jpg');

@endphp
<div id="detach-sticky-top"></div>
{{--@include('partials.components.breadcrumb')--}}
<div class="page-story">
  <header class="page-story--header">
    <div class="page-story--header--title">
      <h1>Rising from the Ashes</h1>
      <h2>An Oral History of the 2016 Gatlinburg Fires</h2>
    </div>
    <img class="page-story--header--background" src="@php print $storyHeader; @endphp"/>
    <canvas id="story-grain" class="page-story--grain"></canvas>
    <div class="page-story--grain--fade-in"></div>
    <div class="page-story--grain--fade-out"></div>
  </header>
  <div class="container page-body--container page-body--story">
    <div class="page-body--flex">
      <aside class="page-body--aside page-body--aside-hidden">
        @include('partials.sidebar')
      </aside>
      <main class="page-body--content page-body--content-formal">
        @include('partials.content-page--formal')
      </main>
    </div>
    <div id="detach-sticky-bottom"></div>
  </div>
</div>
