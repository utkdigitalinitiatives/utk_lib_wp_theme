<div id="detach-sticky-top"></div>
@include('partials.components.breadcrumb')
<div class="container page-body--container">
    <div class="page-body--flex">
        <main class="page-body--content">
            <div class="facetwp-template">
                @if (!have_posts())
                    <div class="alert alert-warning">
                        {{ __('Sorry, no results were found.', 'sage') }}
                    </div>
                @else
                    @while (have_posts()) @php the_post() @endphp
                        @include('partials.content-'.get_post_type())
                    @endwhile
                @endif
            </div>
            <div class="facetwp-pager">
                @php echo facetwp_display('pager') @endphp
            </div>
        </main>
        <aside class="page-body--aside">
            <div class="page-body--aside--facets">
                <div class="page-body--aside--facets--item">
                    <h4>Search Articles</h4>
                    @php echo facetwp_display('facet', 'post_search'); @endphp
                </div>
                <div class="page-body--aside--facets--item">
                    <h4>Filter by Date</h4>
                    @php echo facetwp_display('facet', 'post_month_year'); @endphp
                </div>
                <div class="page-body--aside--facets--item">
                    <h4>Filter by Category</h4>
                    @php echo facetwp_display('facet', 'post_categories'); @endphp
                </div>
            </div>
            @include('partials.sidebar')
        </aside>
    </div>
    <div id="detach-sticky-bottom"></div>
</div>
