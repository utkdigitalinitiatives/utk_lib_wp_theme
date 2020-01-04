@php

    Namespace UTKLibrary\Library\Models;

    $data['id'] = get_the_ID();
    $data['fields'] = get_fields();

    $floor = $data['fields']['space_floor'];
    $rooms = $data['fields']['space_rooms'];

    $seats['number'] = $data['fields']['space_seats'];
    $seats['approximate'] = $data['fields']['space_seats_approximate'];

    $volume = $data['fields']['space_volume'];
    $reserve = $data['fields']['space_reserve'];
    $reserve_button = $data['fields']['space_reserve_button'];
    $reserve_text = $data['fields']['space_reserve_button_text'];
    $reserve_url = $data['fields']['space_reseve_url'];
    $reserve_directions = $data['fields']['space_reserve_directions'];

    $show_hours = get_field('space_show_hours', $space_id);
    $inherit_hours = get_field('space_inherit_hours', $space_id);

    $space_daypicker = 'show';

    if ($show_hours && $inherit_hours) {
        $space_hours = 'inherit';
        $space_lid = Space::getLocationLID($data['id']);
        $space_message = null;
    } else if (!$show_hours) {
        $space_hours = 'message';
        $space_message = get_field('space_hours_message', $space_id);
    }

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
                        @if ($reserve_button)
                            <a href="{{$reserve_url}}"
                               class="btn btn-sm btn-secondary btn-inverse btn-outline">@php echo $reserve_text @endphp <span class="icon-right-big"></span></a>
                        @endif
                    @endif
                </div>
            </div>
            <div class="utk-modal-meta">
                <div class="utk-modal-meta--item">
                    <span class="utk-modal-meta--item--label">Location</span>
                    <span class="utk-modal-meta--item--value">@php echo Space::getSpaceLocations($data['id'], true); @endphp</span>
                </div>
                @php echo Space::getSpaceFloor($floor); @endphp
                @php echo Space::getSpaceRooms($rooms); @endphp
            </div>
            <span class="utk-modal-separator"></span>
            <div class="utk-modal-meta utk-modal-meta-list">
                <div class="utk-modal-meta--item">
                    <span class="utk-modal-meta--item--label">
                        @include('partials.svg.svg-space')
                        Type:
                    </span>
                    <span class="utk-modal-meta--item--value">@php echo Space::getSpaceType($data['id'], true); @endphp</span>
                </div>
                @php echo Space::getSpaceCapacity($seats); @endphp
                @php echo Space::getSpaceVolume($volume); @endphp
            </div>
            <span class="utk-modal-separator"></span>
            <div class="utk-space--details--description">
                @php the_content() @endphp
                @if ($reserve_directions)
                    @if ($reserve_button)
                        <a href="@php echo $reserve_url @endphp">
                            <h5>@php echo $reserve_text @endphp</h5>
                        </a>
                    @endif
                    @php echo $reserve_directions @endphp
                @endif
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
    <footer>
        @include('partials.components.related-spaces')
    </footer>
</article>
