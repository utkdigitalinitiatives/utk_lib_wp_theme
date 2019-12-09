@php

    Namespace UTKLibrary\Library\Models;

    if (!$space_id) :
        $space_id = get_the_ID();
        $teaser_class = 'article--link article--trigger';
    else :
        $teaser_class = 'article--link';
    endif;

    $images = get_field('space_images', $space_id);
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
    $featured = get_field('space_featured', $space_id);

    if ($featured)
        array_push($classes, 'space-featured');


    $space_daypicker = null;
    $space_hours = 'inherit';
    $space_lid = Space::getLocationLID($space_id);

@endphp
<article @php post_class($classes) @endphp>
    <a class="@php echo $teaser_class @endphp"
       id="article-formal-@php echo $space_id @endphp"
       data-type="@php echo get_post_type($space_id) @endphp"
       data-id="@php echo $space_id @endphp"
       href="@php the_permalink($space_id) @endphp">
        <div class="article--context">
            <span class="article--close"><span class="icon-cancel"></span></span>
            <div class="article--grid--image"
                 href="@php the_permalink($space_id) @endphp">
                @include('partials.components.image')
                <div class="article--grid--image--overlay">
                    @include('partials.components.space-hours')
                </div>
            </div>
            <header class="article--header">
                <h2 class="article--header--title entry-title">
                    @php echo get_the_title($space_id) @endphp
                </h2>
                <div class="article--meta article--meta-excerpt">
                    <div class="article--meta article--meta-categories">
                        <span class="article--meta-categories--dimple"></span>
                        @php echo Space::getSpaceLocations($space_id); @endphp
                    </div>
                </div>
            </header>
        </div>
    </a>
</article>
