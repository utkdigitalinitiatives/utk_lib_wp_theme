@php

/*
 * Build thumbnail for rendering with LazyLoad srcset if available.
 */

$id         = get_post_thumbnail_id();
$img        = get_the_post_thumbnail();
$pre        = wp_get_attachment_image_src($id, 'preload_square')[0];

@endphp

<div class="article--thumbnail">
    @if( is_user_logged_in() )
        @php echo $img; @endphp
        @else
        <div class="article--thumbnail--pre"
             style="background-image: url('@php echo $pre @endphp');"></div>
        @php echo $img; @endphp
    @endif;
</div>