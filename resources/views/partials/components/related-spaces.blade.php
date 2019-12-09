@php

    Namespace UTKLibrary\Library\Models;

    $related = Space::getRelatedSpaces($data['id'], 4);

@endphp
<div>
    @foreach($related as $space)
        <div>
            <a href="@php echo get_the_permalink($space) @endphp">
                @php echo get_the_title($space) @endphp
            </a>
        </div>
    @endforeach
</div>