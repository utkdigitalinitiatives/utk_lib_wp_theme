@php
    $primary = Volumes::getFeaturedFeature();
    $secondary = Volumes::getQuickPosts('feature', $primary, 5);
@endphp
<div class="utk-splash---feature">
    <div class="utk-splash---feature--primary">
        <a class="feature-post"
           href="@php echo get_the_permalink($primary) @endphp">
            @php echo get_the_post_thumbnail($primary, 'card_image') @endphp
            <h3>@php echo get_the_title($primary); @endphp</h3>
            <span class="utk-splash---feature--meta">
                @if (get_field('feature_custom_author', $primary))
                    @php echo get_field('feature_custom_author', $primary) @endphp
                @else
                    @php echo get_the_author_meta('display_name', $post->post_author) @endphp
                @endif
            </span>
        </a>
    </div>
    <div class="utk-splash---feature--secondary">
        @foreach($secondary as $id)
            <a class="feature-post"
               href="@php echo get_the_permalink($id) @endphp">
                @php echo get_the_post_thumbnail($id, 'gr_thumb') @endphp
                <div>
                    <h3>@php echo get_the_title($id); @endphp</h3>
                    <span class="utk-splash---feature--meta">
                        @if (get_field('feature_custom_author', $id))
                            @php echo get_field('feature_custom_author', $id) @endphp
                        @else
                            @php echo get_the_author_meta('display_name', $post->post_author) @endphp
                        @endif
                    </span>
                </div>
            </a>
        @endforeach
    </div>
</div>