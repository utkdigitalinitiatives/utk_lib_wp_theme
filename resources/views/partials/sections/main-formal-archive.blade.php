@php

    Namespace App\Controllers;

    $header_post = get_option('options_formal_header');

    $archive_layout = get_option('options_formal_default_layout');

    if ($archive_layout === 'taxonomy') :
        $group_by_term = true;
        $group_taxonomy = get_option('options_formal_default_layout_taxonomy');
        $terms = Taxonomy::getTaxonomyTerms($group_taxonomy);
    endif;

@endphp
<div id="detach-sticky-top"></div>
<div class="utk-formal--header--background">
    @php
        $background = wp_get_attachment_image(832, 'hero_image');
        print $background;
    @endphp
</div>
@include('partials.components.breadcrumb')
<div class="container page-body--container">
    <div class="page-body--flex">
        <aside class="page-body--aside page-body--aside-hidden">
            @include('partials.sidebar')
        </aside>
        <main class="page-body--content page-body--content-formal">
            @php print Formal::getFormalHeader($header_post) @endphp
            @include('partials.facets-formal')
            @if($group_by_term)
                @include('partials.components.facetwp-template-grouping')
            @else
                @include('partials.components.facetwp-template')
            @endif
            <div class="facetwp-pager">
                @php echo facetwp_display('pager') @endphp
            </div>
        </main>
    </div>
    <div id="detach-sticky-bottom"></div>
</div>
