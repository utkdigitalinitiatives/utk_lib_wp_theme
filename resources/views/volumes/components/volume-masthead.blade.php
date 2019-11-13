@php

    $term = get_terms(array('taxonomy' => 'volume_category'));
    $acf_id = $term[0]->taxonomy . '_' . $term[0]->term_id;
    $series = get_field('taxonomy_grouping_label', $acf_id);

@endphp
<div class="utk-formal--header--background">
    <div class="utk-volume--title">
        <div class="container">
            <div class="utk-volume--title--inner">
                @if ($series)
                    <span class="utk-volume--title--series">@php echo $series @endphp</span>
                @endif
                <h1>@php echo get_the_title() @endphp</h1>
                @if(get_field('volume_intro'))
                    <span class="utk-volume--title--intro">
                        @php echo get_field('volume_intro') @endphp
                    </span>
                @endif
                @if(get_the_post_thumbnail_caption())
                    <span class="utk-volume--title--caption">
                        @php echo get_the_post_thumbnail_caption() @endphp
                    </span>
                @endif
            </div>
            @include('volumes.partials.secondary-image')
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