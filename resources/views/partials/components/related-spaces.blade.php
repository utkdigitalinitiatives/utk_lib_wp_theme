@php

    Namespace UTKLibrary\Library\Models;

    $related = Space::getRelatedSpaces($data['id'], 4);

@endphp
<div class="utk-space--related">
    <h3>Spaces Similar to @php echo get_the_title($data['id']) @endphp</h3>
    <div class="utk-space--related--items">
        @foreach($related as $space)
            @php
                $space_id = $space;
            @endphp
            @include('partials.content-space-teaser')
        @endforeach
    </div>
</div>