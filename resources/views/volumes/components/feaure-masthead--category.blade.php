<div class="utk-formal--header--background">
    <div class="utk-volume--title">
        <div class="container">
            <div class="utk-volume--title--inner">
                <span class="utk-volume--title--series"></span>
                <a href="@php echo get_the_permalink($featured_item) @endphp">
                    <h2>@php echo get_the_title($featured_item) @endphp</h2>
                </a>
                <a href="@php echo get_the_permalink($featured_item) @endphp"
                   class="btn btn-with-icon">Read More <span class="icon-right-open"></span></a>
                @if(get_field('volume_intro'))
                    <span class="utk-volume--title--intro">
                        @php echo get_field('volume_intro') @endphp
                    </span>
                @endif
            </div>
            @if(get_field('volume_splash'))
                <div class="utk-volume--splash">
                    <div class="container">
                        @php echo get_field('volume_splash') @endphp
                    </div>
                </div>
            @endif
        </div>
    </div>
    @php
        print get_the_post_thumbnail($featured_item, 'hero_image');
    @endphp
</div>