@php

/*
 * Build thumbnail for rendering with LazyLoad srcset if available.
 */

$id  = get_post_thumbnail_id();
$pre = wp_get_attachment_image_src($id, 'post-thumbnail-pre');
$thumb = wp_get_attachment_image_src($id, 'post-thumbnail');

@endphp

<div class="article--thumbnail">
    <div class="article--thumbnail--pre" style="background-image: url('@php echo $pre[0] @endphp');"></div>
    <img src="@php echo $pre[0] @endphp"
         data-lazy-src="@php echo $thumb[0] @endphp"
         alt="this and that" />
</div>
