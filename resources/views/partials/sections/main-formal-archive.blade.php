@php

    Namespace App\Controllers;

    $header_post = get_option('options_formal_header');

@endphp
<div id="detach-sticky-top"></div>
@include('partials.components.breadcrumb')
<div class="container page-body--container">
    <div class="page-body--flex">
        <aside class="page-body--aside page-body--aside-hidden">
            @include('partials.sidebar')
        </aside>
        <main class="page-body--content page-body--content-formal">
            @php print \Formal::getFormalHeader($header_post) @endphp
            @include('partials.facets-formal')
            <div class="facetwp-template">
                @if (!have_posts())
                    <div class="alert alert-warning">
                        {{ __('Sorry, no results were found.', 'sage') }}
                    </div>
                @else
                    @while (have_posts()) @php the_post() @endphp
                        @include('partials.content-'.get_post_type() . '-teaser')
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
