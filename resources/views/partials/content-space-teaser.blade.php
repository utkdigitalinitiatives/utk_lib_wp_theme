@php

    $primary_location = wp_get_post_terms(get_the_ID(), 'location', array( 'parent' => 0 ));
    $secondary_location = wp_get_post_terms(get_the_ID(), 'location', array( 'parent' => $primary_location[0]->term_id ));

    $images = get_field('space_images');
    $image_count = count($images);

    if ($image_count > 0) {
        $render_size = 'card_image';
        $preload_size = 'preload_gr_horz';
        $image_post_id = $images[0]['ID'];
        $image  = $images[0];
        $srcset = wp_get_attachment_image_srcset($image_post_id, 'card_image');
    } else {
        //
    }

    $classes = [];
    $featured = get_field('space_featured');

    if ($featured)
        array_push($classes, 'space-featured');

@endphp
<article @php post_class($classes) @endphp>
    <a class="article--trigger"
       id="article-formal-@php echo get_the_ID() @endphp"
       data-type="@php echo get_post_type() @endphp"
       data-id="@php echo get_the_ID() @endphp"
       href="@php the_permalink() @endphp">
        <div class="article--context">
            <span class="article--close"><span class="icon-cancel"></span></span>
            <div class="article--grid--image"
                 href="@php the_permalink() @endphp">
                @include('partials.components.image')
                <div class="article--grid--image--overlay">
                    <div class="utk-space--time">
                        <span class="utk-space--time--indicator"></span>
                        <span class="utk-space--time--span">8am - 6pm</span>
                    </div>
                </div>
            </div>
            <header class="article--header">
                <h2 class="article--header--title entry-title">
                    @php the_title() @endphp
                </h2>
                <div class="article--meta article--meta-excerpt">
                    <div class="article--meta article--meta-categories">
                        <span class="article--meta-categories--dimple"></span>
                        @php echo $primary_location[0]->name; @endphp
                        @if(count($secondary_location) > 0)
                            > @php print $secondary_location[0]->name; @endphp
                        @endif
                    </div>
                </div>
            </header>
        </div>
    </a>
</article>
