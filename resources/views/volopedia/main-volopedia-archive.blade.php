<div class="container page-body--container">
    <div class="page-body--flex">
        <aside class="page-body--aside">
            @include('volopedia.partials.sidebar-volopedia')
        </aside>
        <main class="page-body--content">
            <div class="facetwp-template">
                @if (!have_posts())
                    @include('volopedia.partials.archive-meta')
                    <div class="alert alert-warning">
                        {{ __('No entries are available for this volume.', 'sage') }}
                    </div>
                @else
                    @include('volopedia.partials.archive-meta')
                    <div class="facetwp-pager">
                        @php echo facetwp_display('pager') @endphp
                    </div>
                    @while (have_posts()) @php the_post() @endphp
                        @include('volopedia.partials.content')
                    @endwhile
                @endif
            </div>
            <div class="facetwp-pager">
                @php echo facetwp_display('pager') @endphp
            </div>
        </main>
    </div>
    <div id="detach-sticky-bottom"></div>
</div>