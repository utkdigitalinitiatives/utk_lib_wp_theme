@php

    Namespace UTKLibrary\Library\Models;

    $related = Space::getRelatedSpaces($data['id'], 4);

@endphp
<div class="utk-spaces--related">
    @foreach($related as $space)
        @php
            $space_id = $space;
        @endphp
        @include('partials.content-space-teaser')
    @endforeach
</div>