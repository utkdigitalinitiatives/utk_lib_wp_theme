@php
    $primary = Volumes::getFeaturedFeature();
    $secondary = Volumes::getQuickPosts('feature', $primary, 4);
@endphp
<div class="utk-splash---feature">
    <div class="utk-splash---feature--primary">
        <a href="@php echo get_the_permalink($primary) @endphp">
            @php echo get_the_post_thumbnail($primary, 'callout_image') @endphp
            <h3>@php echo get_the_title($primary); @endphp</h3>
        </a>
    </div>
    <div class="utk-splash---feature--secondary">
        @foreach($secondary as $id)
            <a href="@php echo get_the_permalink($id) @endphp">
                @php echo get_the_post_thumbnail($id, 'callout_image') @endphp
                <h3>@php echo get_the_title($id); @endphp</h3>
            </a>
        @endforeach
    </div>
</div>