<div id="detach-sticky-top"></div>
<div class="container page-body--container">
    @include('partials.components.breadcrumb')
    <div class="page-body--flex">
        <main class="page-body--content">
            <div class="facetwp-template">
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
            </div>
        </main>
        <aside class="page-body--aside">
            @php
                echo facetwp_display( 'facet', 'post_search' );
                echo facetwp_display( 'facet', 'post_categories' );
            @endphp
            @include('partials.sidebar')
        </aside>
    </div>
    <div id="detach-sticky-bottom"></div>
</div>
