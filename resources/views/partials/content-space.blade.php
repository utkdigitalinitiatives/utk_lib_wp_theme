@php

    $data['id'] = get_the_ID();
    $data['fields'] = get_fields()

@endphp
<article @php post_class() @endphp>
    <div>
        <div class="utk-space--media">
            <div class="utk-space--media--slider">
                @include('partials.components.image-slider')
            </div>
            @if (count($data['fields']['space_images']) > 1)
                <div class="utk-space--media--slider--overlay"></div>
            @endif
        </div>
        <div>
            <div>image gallery</div>
            <div>info</div>
            <div>description</div>
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
