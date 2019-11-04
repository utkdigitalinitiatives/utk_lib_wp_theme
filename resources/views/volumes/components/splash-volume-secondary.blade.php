@php
    $secondary = Volumes::getQuickPosts('volume', $featured_item, 1);
@endphp
<div class="utk-splash---volume">
    <div class="utk-splash---volume--secondary">
        @foreach($secondary as $id)
            <a href="@php echo get_the_permalink($id) @endphp">
                <h2>@php echo get_the_title($id); @endphp</h2>
                @php echo get_the_post_thumbnail($id, 'callout_image') @endphp
            </a>
        @endforeach
    </div>
</div>