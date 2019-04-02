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
            <div class="facetwp-template">
                @while (have_posts()) @php the_post() @endphp
                    @include('partials.content-'.get_post_type())
                @endwhile
            </div>
            {!! get_the_posts_navigation() !!}
        </main>
        <aside class="page-body--aside">
            <div class="page-body--aside--facets">
                <h4>Search Articles</h4>
                @php echo facetwp_display( 'facet', 'post_search' ); @endphp
                <h4>Filter by Date</h4>
                @php echo facetwp_display( 'facet', 'post_month_year' ); @endphp
                <h4>Filter by Category</h4>
                @php echo facetwp_display( 'facet', 'post_categories' ); @endphp
            </div>
            @include('partials.sidebar')
        </aside>
    </div>
    <div id="detach-sticky-bottom"></div>
</div>
