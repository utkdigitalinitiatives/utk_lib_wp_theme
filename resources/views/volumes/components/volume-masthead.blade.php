<div class="utk-formal--header--background">
    <div class="utk-volume--title">
        <div class="container">
            <div class="utk-volume--title--inner">
                <span class="utk-volume--title--series">Boundless Series {{$featured_id}}</span>
                <h1>@php echo get_the_title($featured_item) @endphp</h1>
                @if(get_field('volume_intro'))
                    <span class="utk-volume--title--intro">
                        @php echo get_field('volume_intro') @endphp
                    </span>
                @endif
            </div>
            @if(get_field('volume_secondary_image'))
                @php
                    $offset = intval(get_field('volume_secondary_image_offset'));

                    if ($offset !== 0) :
                        $offset .= 'px';
                    endif;

                @endphp
                <div class="utk-svg" style="margin-left: {{$offset}};">
                    @php print wp_get_attachment_image(get_field('volume_secondary_image'), 'post-thumbnail'); @endphp
                </div>
            @endif
        </div>
    </div>
    @php
        print get_the_post_thumbnail($featured_item, 'hero_image');
    @endphp
</div>
@if(get_field('volume_splash'))
    <div class="utk-volume--splash">
        <div class="container">
            @php echo get_field('volume_splash') @endphp
        </div>
    </div>
@endif