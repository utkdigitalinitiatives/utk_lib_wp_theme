@php

    Namespace UTKLibrary\Library\Models;

    $id = $data['id'];
    $floor = $data['fields']['space_floor'];
    $rooms = $data['fields']['space_rooms'];

    $seats['number'] = $data['fields']['space_seats'];
    $seats['approximate'] = $data['fields']['space_seats_approximate'];

    $volume = $data['fields']['space_volume'];
    $reserve = $data['fields']['space_reserve'];
    $reserve_url = $data['fields']['space_reseve_url'];

    $space_daypicker = 'show';
    $space_hours = 'inherit';
    $space_lid = Space::getLocationLID($id);

@endphp
<article @php post_class('space', $id) @endphp>
    <div class="utk-space-actions">
        @include('partials.components.space-hours')
    </div>
    <div class="utk-space--media">
        <div class="utk-space--media--slider">
            @include('partials.components.image-slider')
        </div>
        <div class="utk-space--media--slider--overlay"></div>
    </div>
    <div class="utk-space--content">
        <div class="utk-space--content--wrap">
            <header>
                <a href="@php the_permalink($id) @endphp" class="utk-space--permalink">
                    <h3>@php echo $data['title']; @endphp</h3>
                </a>
                <div class="utk-space--content--wrap--funnel">
                    <a href="@php the_permalink($id) @endphp">More Details <span class="icon-right-big"></span></a>
                    @if($reserve)
                        <a href="{{$reserve_url}}">Reserve Space <span class="icon-right-big"></span></a>
                    @endif
                </div>
            </header>
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
            </div>
            <div class="utk-space--content--description">
                <p>Fusce tortor ante, 80+ congue vel erat a, dapibus convallis orci. Ut pharetra, urna at mattis dignissim, massa neque gravida purus, alma 200 id sagittis diam. In et nibh semper sapien vehicula dictum.</p>
                <p>Ut pharetra, urna at mattis dignissim, massa neque gravida purus, alma 200 id sagittis diam. In et nibh semper sapien vehicula dictum.</p>
            </div>
        </div>
    </div>
</article>
