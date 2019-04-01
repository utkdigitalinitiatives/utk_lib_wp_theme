@php

/*
 * Build thumbnail for rendering with LazyLoad srcset if available.
 */

$id     = get_post_thumbnail_id();
$pre    = wp_get_attachment_image_src($id, 'post-thumbnail-pre')[0];
$thumb  = wp_get_attachment_image_src($id, 'post-thumbnail')[0];
$alt    = get_post_meta($id, '_wp_attachment_image_alt')[0];

@endphp

<div class="article--thumbnail">
    @if( is_user_logged_in() )
        <img src="@php echo $thumb @endphp"
             alt="@php echo $alt @endphp" />
        @else
        <div class="article--thumbnail--pre"
             style="background-image: url('@php echo $pre @endphp');"></div>
        <img src="@php echo $pre @endphp"
             data-lazy-src="@php echo $thumb @endphp"
             alt="@php echo $alt @endphp" />
    @endif;
</div>
