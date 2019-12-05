@php

    Namespace UTKLibrary\Library\Models;

    $data['id'] = get_the_ID();
    $data['fields'] = get_fields();

    $reserve = $data['fields']['space_reserve'];
    $reserve_url = $data['fields']['space_reseve_url'];

    $space_daypicker = 'show';
    $space_hours = 'inherit';
    $space_lid = Space::getLocationLID($data['id']);
    $space_message = null;

@endphp
<article @php post_class() @endphp>
    <div class="utk-space--sheet">
        <div class="utk-space--details">
            <div class="utk-space--details--interactions">
                @include('partials.components.space-hours')
                <div class="utk-space--details--interactions--steps">
                    <a href="@php echo get_post_type_archive_link('space') @endphp"
                       class="utk-space--back btn btn-sm btn-secondary btn-inverse btn-outline">Back to Spaces</a>
                    @if($reserve === 'Yes')
                        <a href="{{$reserve_url}}"
                           class="btn btn-sm btn-secondary btn-inverse btn-outline">Reserve Space <span class="icon-right-big"></span></a>
                    @endif
                </div>
            </div>
            <div class="utk-space--content--description">
                <p>Fusce tortor ante, 80+ congue vel erat a, dapibus convallis orci. Ut pharetra, urna at mattis dignissim, massa neque gravida purus, alma 200 id sagittis diam. In et nibh semper sapien vehicula dictum.</p>
                <p>Ut pharetra, urna at mattis dignissim, massa neque gravida purus, alma 200 id sagittis diam. In et nibh semper sapien vehicula dictum.</p>
            </div>
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
