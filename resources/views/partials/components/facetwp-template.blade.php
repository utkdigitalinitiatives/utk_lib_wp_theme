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