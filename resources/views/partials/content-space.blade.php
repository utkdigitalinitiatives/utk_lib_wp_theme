@php

    $data['id'] = get_the_ID();
    $data['fields'] = get_fields()

@endphp
<article @php post_class() @endphp>
    <div class="utk-space--sheet">
        <div class="utk-space--details">
            <div class="page-body--content--inner--interactions">
                <a href="@php echo get_post_type_archive_link('space') @endphp"
                   class="utk-space--back btn btn-primary">Back to Spaces</a>
            </div>
            <div>image gallery</div>
            <div>info</div>
            <div>description</div>
        </div>
        <div class="utk-space--media">
            <div class="utk-space--media--slider">
                @include('partials.components.image-slider')
            </div>
            @if (count($data['fields']['space_images']) > 1)
                <div class="utk-space--media--slider--overlay"></div>
            @endif
        </div>
    </div>
    <div>
        <div class="entry-content">
            @php the_content() @endphp
        </div>
    </div>
    <footer>
        You may also be interested in...
    </footer>
</article>
