<div class="facetwp-template">
    @foreach($terms as $term)
        @php $term_header = false; @endphp
        @if (have_posts())
            @while (have_posts()) @php the_post() @endphp
                @php
                    if (has_term($term, $group_taxonomy))
                        $term_header = true;
                @endphp
            @endwhile
            @if ($term_header)
                @php
                    echo Taxonomy::getTaxonomyTerm($term, $group_taxonomy);
                @endphp
            @endif
            <div class="facetwp-template--articles">
                @while (have_posts()) @php the_post() @endphp
                    @if(has_term($term, $group_taxonomy))
                        @include('partials.content-'.get_post_type() . '-teaser')
                    @endif
                @endwhile
            </div>
        @endif
    @endforeach
</div>