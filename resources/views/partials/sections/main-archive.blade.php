<div id="detach-sticky-top"></div>
<div class="container page-body--container">
  @include('partials.components.breadcrumb')
  <div class="page-body--flex">
    <main class="page-body--content">
      @if (!have_posts())
        <div class="alert alert-warning">
          {{ __('Sorry, no results were found.', 'sage') }}
        </div>
        {!! get_search_form(false) !!}
      @endif
      @while (have_posts()) @php the_post() @endphp
      @include('partials.content-'.get_post_type())
      @endwhile
      {!! get_the_posts_navigation() !!}
    </main>
    <aside class="page-body--aside">
      @php
        echo facetwp_display( 'facet', 'categories' );
      @endphp
      @include('partials.sidebar')
    </aside>
  </div>
  <div id="detach-sticky-bottom"></div>
</div>
