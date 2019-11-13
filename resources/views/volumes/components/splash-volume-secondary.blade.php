@php
    $secondary = Volumes::getQuickPosts('volume', $featured_item, 1);
    $set_post_type = 'volume';
    $exclude_features = true;
@endphp
@include('volumes.partials.related-posts')