@php

    if ($set_post_type) :
        $post_type = $set_post_type;
    else :
        $post_type = get_post_type();
    endif;

    if ($featured_item) :
        $exclude_post_ids = $featured_item;
    else :
        $exclude_post_ids = get_the_ID();
    endif;

    $args = [
        'post_type' => $post_type,
        'posts_per_page' => 1,
        'post__not_in' => [$exclude_post_ids],
        'tax_query' => [
            [
                'taxonomy' => 'volume_category',
                'field'    => 'slug',
                'terms'    => 'boundless',
            ],
        ],
    ];

    $query = new \WP_Query( $args );

@endphp
@if($query->have_posts())
    <div class="page-body-related">
        <div class="container">
            @while($query->have_posts()) @php $query->the_post() @endphp
                <a href="@php echo get_the_permalink() @endphp"
                   class="page-body-related--post">
                    <div class="page-body-related--post--content">
                        @include('volumes.partials.secondary-image')
                        <h3>@php echo get_the_title() @endphp</h3>
                        @if(get_field('volume_intro'))
                            <p>@php echo get_field('volume_intro') @endphp</p>
                        @endif
                    </div>
                    <div class="page-body-related--post--media">
                        @php echo get_the_post_thumbnail(null, 'callout_image') @endphp
                        <span class="page-body-related--post--media--caption">@php echo get_the_post_thumbnail_caption() @endphp</span>
                    </div>
                </a>
            @endwhile
        </div>
    </div>
@endif
@php
    wp_reset_postdata();
@endphp
