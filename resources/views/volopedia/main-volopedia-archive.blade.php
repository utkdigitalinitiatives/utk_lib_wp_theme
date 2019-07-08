@include('partials.components.breadcrumb')
@include('volopedia.partials.glossary-nav')
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
                        @include('volopedia.partials.content')
                    @endwhile
                @endif
            </div>
            <div class="facetwp-pager">
                @php echo facetwp_display('pager') @endphp
            </div>
        </main>
        <aside class="page-body--aside">
            @include('volopedia.partials.sidebar-volopedia')
        </aside>
    </div>
    <div id="detach-sticky-bottom"></div>
</div>