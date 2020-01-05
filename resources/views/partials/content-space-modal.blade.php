@php

    Namespace UTKLibrary\Library\Models;

    $id = $data['id'];
    $floor = $data['fields']['space_floor'];
    $rooms = $data['fields']['space_rooms'];

    $seats['number'] = $data['fields']['space_seats'];
    $seats['approximate'] = $data['fields']['space_seats_approximate'];

    $volume = $data['fields']['space_volume'];
    $access = $data['fields']['space_access'];
    $reserve = $data['fields']['space_reserve'];
    $reserve_button = $data['fields']['space_reserve_button'];
    $reserve_text = $data['fields']['space_reserve_button_text'];
    $reserve_url = $data['fields']['space_reseve_url'];
    $reserve_directions = $data['fields']['space_reserve_directions'];

    $show_hours = $data['fields']['space_show_hours'];
    $inherit_hours = $data['fields']['space_inherit_hours'];

    $space_daypicker = 'show';

    if ($show_hours && $inherit_hours) {
        $space_hours = 'inherit';
        $space_lid = Space::getLocationLID($id);
        $space_message = null;
    } else if (!$show_hours) {
        $space_hours = 'message';
        $space_message = $data['fields']['space_hours_message'];
    }

    $permalink = get_the_permalink($id);

    $content = get_the_content(null, null, $id);
    $content = apply_filters( 'the_content', $content );
    $content = str_replace( ']]>', ']]&gt;', $content );

@endphp
<article @php post_class('space', $id) @endphp>
    <div class="utk-space--media">
        <header>
            <a href="@php echo $permalink @endphp" class="utk-space--permalink">
                <h3>@php echo $data['title']; @endphp</h3>
            </a>
            <div class="utk-space--content--wrap--funnel">
                <a href="@php echo $permalink @endphp">More Details <span class="icon-right-big"></span></a>
                @if($reserve === 'Yes')
                    @if ($reserve_button)
                        <a href="{{$reserve_url}}">@php echo $reserve_text @endphp <span class="icon-right-big"></span></a>
                    @endif
                @endif
            </div>
        </header>
        <div class="utk-space--media--slider">
            @include('partials.components.image-slider')
        </div>
        @if (count($data['fields']['space_images']) > 1)
            <div class="utk-space--media--slider--overlay"></div>
        @endif
    </div>
    <div class="utk-space--content">
        <div class="utk-space--content--wrap">
            <div class="utk-space-actions">
                @include('partials.components.space-hours')
            </div>
            <span class="utk-modal-separator"></span>
            <div class="utk-modal-meta">
                <div class="utk-modal-meta--item">
                    <span class="utk-modal-meta--item--label">Location</span>
                    <span class="utk-modal-meta--item--value">@php echo Space::getSpaceLocations($id, true); @endphp</span>
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
                    <span class="utk-modal-meta--item--value">@php echo Space::getSpaceType($id, true); @endphp</span>
                </div>
                @php echo Space::getSpaceCapacity($seats); @endphp
                @php echo Space::getSpaceVolume($volume); @endphp
                @php echo Space::getSpaceAccess($access); @endphp
            </div>
            <div class="utk-space--content--description">
                @php echo $content; @endphp
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
    </div>
</article>
