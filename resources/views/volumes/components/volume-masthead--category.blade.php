@php
    $id = get_queried_object()->term_id;
    $term = get_term($id);
    $acf_id = $term->taxonomy . '_' . $id;
@endphp
<div class="utk-formal--header--background">
    <div class="utk-volume--title">
        <div class="container">
            <div class="utk-volume--title--inner">
                <h1>@php print single_term_title(); @endphp</h1>
                @if (get_field('taxonomy_subtitle', $acf_id))
                    <h2>@php echo get_field('taxonomy_subtitle', $acf_id) @endphp</h2>
                @endif
                @if (get_field('taxonomy_short_description', $acf_id))
                    <span class="utk-volume--title--intro">@php echo get_field('taxonomy_short_description', $acf_id) @endphp</span>
                @endif
            </div>
        </div>
    </div>
    @php
        print get_the_post_thumbnail($featured_item, 'hero_image');
    @endphp
</div>