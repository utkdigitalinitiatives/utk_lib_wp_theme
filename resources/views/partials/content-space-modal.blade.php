@php

    Namespace UTKLibrary\Library\Models;

    $id = $data['id'];
    $floor = $data['fields']['space_floor'];
    $rooms = $data['fields']['space_rooms'];

    $seats['number'] = $data['fields']['space_seats'];
    $seats['approximate'] = $data['fields']['space_seats_approximate'];

    $volume = $data['fields']['space_volume'];

@endphp
<article @php post_class('space', $id) @endphp>
    <div class="utk-space--content">
        <div class="utk-space--content--wrap">
            <header>
                <h3>@php echo $data['title']; @endphp</h3>
            </header>
            <div class="utk-space-actions">
                <div class="utk-space--date-picker">
                    <div class="utk-space--day-picker--select"></div>
                    <div class="utk-space--time">
                        <span class="utk-space--time--indicator"></span>
                        <span class="utk-space--time--span">8am - 6pm</span>
                    </div>
                </div>
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
            </div>
            <div class="utk-space--content--description">
                <p>Fusce tortor ante, 80+ congue vel erat a, dapibus convallis orci. Ut pharetra, urna at mattis dignissim, massa neque gravida purus, alma 200 id sagittis diam. In et nibh semper sapien vehicula dictum.</p>
                <p>Ut pharetra, urna at mattis dignissim, massa neque gravida purus, alma 200 id sagittis diam. In et nibh semper sapien vehicula dictum.</p>
            </div>
        </div>
    </div>
    <div class="utk-space--media">
        <div class="utk-space--media--slider">
            @include('partials.components.image-slider')
            <div class="utk-space--media--slider--overlay">
                <a href="#" class="btn btn-primary">
                    Reserve
                </a>
                <a href="@php the_permalink($id) @endphp"  class="btn btn-with-icon">
                    Read More
                    <span class="icon-right-open"></span>
                </a>
            </div>
        </div>
    </div>
</article>
