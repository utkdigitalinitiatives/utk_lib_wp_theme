@php

/*
 * Build thumbnail for rendering with LazyLoad srcset if available.
 */
    $size       = 'post-thumbnail';
    $thumb      = get_the_post_thumbnail($post, $size);

@endphp

<div class="article--thumbnail">
    @php echo $thumb @endphp
</div>
