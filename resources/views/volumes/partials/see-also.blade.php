@php
    $related = get_field('volume_related_content');
@endphp
@if($related)
    <div class="utk-item-list">
        <header>
            <h3>See Also <span class="icon-down-open"></span></h3>
        </header>
        <ul>
            @foreach($related as $post_id)
                <li>
                    <a href="@php echo get_the_permalink($post_id) @endphp">
                        @php echo get_the_title($post_id) @endphp
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endif