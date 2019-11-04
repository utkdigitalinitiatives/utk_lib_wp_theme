@php
    $primary = Volumes::getFeaturedFeature();
    $secondary = Volumes::getQuickPosts('feature', $primary, 3);
@endphp
<div class="utk-splash---feature">
    <div class="utk-splash---feature--primary">
        <a href="@php echo get_the_permalink($primary) @endphp">
            <h2>@php echo get_the_title($primary); @endphp</h2>
            @php echo get_the_post_thumbnail($primary, 'callout_image') @endphp
        </a>
    </div>
    <div class="utk-splash---feature--secondary">
        @foreach($secondary as $id)
            <a href="@php echo get_the_permalink($id) @endphp">
                <h2>@php echo get_the_title($id); @endphp</h2>
                @php echo get_the_post_thumbnail($id, 'callout_image') @endphp
            </a>
        @endforeach
    </div>
</div>