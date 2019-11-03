@php

    Namespace App\Controllers;

    $formal_header = get_option('options_formal_header');

    $archive_layout = get_option('options_formal_default_layout');
    $archive_description = get_option('options_formal_archive_description');

    if ($archive_layout === 'taxonomy') :
        $group_by_term = true;
        $group_taxonomy = get_option('options_formal_default_layout_taxonomy');
        $terms = Taxonomy::getTaxonomyTerms($group_taxonomy);
    endif;

    $formal_type = get_field('formal_type', null, false);

@endphp
<div id="detach-sticky-top"></div>
{{--@include('partials.components.breadcrumb')--}}
@php print \Formal::getFormalHeader($formal_header) @endphp
<div class="container page-body--container">
    <div class="page-body--flex">
        <aside class="page-body--aside page-body--aside-hidden">
            @include('partials.sidebar')
        </aside>
        <main class="page-body--content page-body--content-formal">
            @include('partials.facets-formal')
            @if($archive_description)
                @php echo $archive_description @endphp
            @endif
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
