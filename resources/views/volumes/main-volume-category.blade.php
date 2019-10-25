@php

    // set featured item for taxonomy mastheads
    $featured_item = Volumes::getFeaturedItem();
    $content = Volumes::getTermContent();

@endphp
<div id="detach-sticky-top"></div>
@include('volumes.components.volume-masthead--category')
<div class="container page-body--container">
    <div class="page-body--flex">
        <main class="page-body--content page-body--content-volumes">
            @if (!have_posts())
                <div class="alert alert-warning">
                    {{ __('Sorry, no results were found.', 'sage') }}
                </div>
            @else
                @while (have_posts()) @php the_post() @endphp
                    @include('volumes.content-volume-teaser')
                @endwhile
            @endif
        </main>
        <aside class="page-body--aside">
            @php print $content; @endphp
            @include('partials.sidebar')
        </aside>
    </div>
    <div id="detach-sticky-bottom"></div>
</div>
