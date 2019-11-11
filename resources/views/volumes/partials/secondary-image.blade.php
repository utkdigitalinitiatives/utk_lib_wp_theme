@if(get_field('volume_secondary_image'))
    @php
        $offset = intval(get_field('volume_secondary_image_offset'));

        if ($offset !== 0) :
            $offset .= 'px';
        endif;

    @endphp
    <div class="utk-svg" style="margin-left: {{$offset}};">
        @php print wp_get_attachment_image(get_field('volume_secondary_image'), 'post-thumbnail'); @endphp
    </div>
@endif
