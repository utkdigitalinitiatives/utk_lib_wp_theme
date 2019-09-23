@php

    Namespace UTKLibrary\Library\Models;

    $id = $data['id'];
    $floor = $data['fields']['space_floor'];
    $rooms = $data['fields']['space_rooms'];

    $seats['number'] = $data['fields']['space_seats'];
    $seats['approximate'] = $data['fields']['space_seats_approximate'];

    $volume = $data['fields']['space_volume'];

    $images = $data['fields']['space_images'];
    $image_count = count($images);

    if ($image_count > 0) {
        $render_size = 'card_image';
        $preload_size = 'preload_gr_horz';
        $image_post_id = $images[0]['ID'];
        $image  = $images[0];
        $srcset = wp_get_attachment_image_srcset($image_post_id, 'card_image');
    } else {
        //
    }

@endphp
<article @php post_class('space', $id) @endphp>
    <div class="utk-space--content">
        <header>
            <h3>@php echo $data['title']; @endphp</h3>
        </header>
        <div class="utk-space-actions">
            <div class="utk-date-picker">
                <a  class="utk-date-picker-select" href="#">Monday 9/23/19 <span class="icon-down-open"></span></a>
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
        <div class="utk-space--content--wrap">
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
        <div class="utk-space--media--slider"
             href="@php the_permalink() @endphp">
            @include('partials.components.image')
            <div class="utk-space--media--slider--overlay">
                <a href="#" class="btn btn-inverse btn-outline btn-secondary">
                    Reserve Space
                </a>
                <a href="#" class="btn btn-with-icon">
                    Read More
                    <span class="icon-right-open"></span>
                </a>
            </div>
        </div>
    </div>
</article>
