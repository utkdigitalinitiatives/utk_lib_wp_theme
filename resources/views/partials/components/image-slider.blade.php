@php

    $images = $data['fields']['space_images'];
    $image_count = count($images);
    $render_size = 'card_image';
    $preload_size = 'preload_gr_horz';

@endphp

@if($image_count > 1)
    <div class="utk-space-slider-display">
        @foreach($images as $image)
            @php
                $image_post_id = $image['ID'];
                $srcset = wp_get_attachment_image_srcset($image_post_id, 'card_image');
            @endphp
            @include('partials.components.image')
        @endforeach
    </div>
    <div class="utk-space-slider-nav">
        @foreach($images as $image)
            @php
                $image_post_id = $image['ID'];
                $srcset = wp_get_attachment_image_srcset($image_post_id, 'card_image');
            @endphp
            @include('partials.components.image')
        @endforeach
    </div>
@else
    @php
        $image_post_id = $images[0]['ID'];
        $image  = $images[0];
        $srcset = wp_get_attachment_image_srcset($image_post_id, 'card_image');
    @endphp
    @include('partials.components.image')
@endif
<script>
    (function($, log) {
        $(document).ready(function(){
            $('.utk-space-slider-display').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: true,
                asNavFor: '.utk-space-slider-nav',
                accessibility: true
            });
            $('.utk-space-slider-nav').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                asNavFor: '.utk-space-slider-display',
                variableWidth: true,
                dots: false,
                touchMove: true,
                touchThreshold: 1,
                verticalSwiping: true,
                rtl: false,
                draggable: false,
                centerMode: true,
                focusOnSelect: true,
                autoplay: false,
                arrows: false,
                accessibility: true
            });
        });
    })(jQuery, console.log);
</script>