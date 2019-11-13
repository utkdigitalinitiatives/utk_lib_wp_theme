@php
    if ($featured_item) :
        $post_id = $featured_item;
    else :
        $post_id = get_the_ID();
    endif
@endphp
@if(get_field('volume_secondary_image', $post_id))
    @php
        $offset = intval(get_field('volume_secondary_image_offset', $post_id));

        if ($offset !== 0) :
            $offset .= 'px';
        endif;

    @endphp
    <div class="utk-svg" style="margin-left: {{$offset}};">
        @php print wp_get_attachment_image(get_field('volume_secondary_image', $post_id), 'post-thumbnail'); @endphp
    </div>
@endif
