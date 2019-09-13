<div class="facetwp-template">
    @foreach($terms as $term)
        @php
            echo Taxonomy::getTaxonomyTerm($term, $group_taxonomy);
        @endphp
        @if (!have_posts())
            <div class="alert alert-warning">
                {{ __('Sorry, no results were found.', 'sage') }}
            </div>
        @else
            @while (have_posts()) @php the_post() @endphp
            @if(has_term($term, $group_taxonomy))
                @include('partials.content-'.get_post_type() . '-teaser')
            @endif
            @endwhile
        @endif
    @endforeach
</div>