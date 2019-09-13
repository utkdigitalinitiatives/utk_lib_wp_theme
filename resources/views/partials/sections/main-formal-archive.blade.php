@php

    Namespace App\Controllers;

    $header_post = get_option('options_formal_header');

    $archive_layout = get_option('options_formal_default_layout');

    if ($archive_layout === 'taxonomy') :
        $group_by_term = true;
        $group_taxonomy = get_option('options_formal_default_layout_taxonomy');
        $terms = Taxonomy::getTaxonomyTerms($group_taxonomy);
    endif;
        print_r ($group_taxonomy);


@endphp
<div id="detach-sticky-top"></div>
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
                @foreach($terms as $term)
                    @php
                        echo Taxonomy::getTaxonomyTerm($term, $group_taxonomy);
                    @endphp
                    @php
                        $args = array(
                            'post_type' => get_post_type(),
                            'posts_per_page' => -1,
                            'orderby' => 'title',
                            'order' => 'ASC',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => $group_taxonomy,
                                    'field'    => 'slug',
                                    'terms'    => $term->slug,
                                ),
                            ),
                        );
                        $group_query = new \WP_Query( $args );
                    @endphp
                    <div class="facetwp-template">
                        @if (!$group_query->have_posts())
                            <div class="alert alert-warning">
                                {{ __('Sorry, no results were found.', 'sage') }}
                            </div>
                        @else
                            @while ($group_query->have_posts()) @php $group_query->the_post() @endphp
                                @include('partials.content-'.get_post_type() . '-teaser')
                            @endwhile
                        @endif
                    </div>
                    @php
                        wp_reset_postdata();
                    @endphp
                @endforeach
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
