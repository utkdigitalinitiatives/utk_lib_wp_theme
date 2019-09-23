@php

    Namespace UTKLibrary\Library\Models;

    $id = $data['id'];
    $floor = $data['fields']['space_floor'];
    $rooms = $data['fields']['space_rooms'];

@endphp
<article @php post_class() @endphp>
    <div class="utk-space--content">
        <header>
            <h3>@php echo $data['title']; @endphp</h3>
        </header>
        <div class="utk-modal-meta">
            <div class="utk-modal-meta--item">
                <span class="utk-modal-meta--item--label">Location</span>
                <span class="utk-modal-meta--item--value">@php echo Space::getSpaceLocations($id, true); @endphp</span>
            </div>
            @php echo Space::getSpaceFloor($floor); @endphp
            @php echo Space::getSpaceRooms($rooms); @endphp
        </div>
        <span class="utk-modal-separator"></span>
        <div>
            more...
            @php // date-picker-js; @endphp
            @php // reservations @endphp
        </div>
    </div>
    <div class="utk-space--media">
    </div>
</article>
