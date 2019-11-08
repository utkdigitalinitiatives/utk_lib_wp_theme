@php
    $id = get_queried_object()->term_id;
    $term = get_term($id);
@endphp
<div class="utk-formal--header--background">
    <div class="utk-volume--title">
        <div class="container">
            <div class="utk-volume--title--inner">
                <h1>@php print $term->name; @endphp</h1>
                @if (get_field('taxonomy_subtitle', $term->taxonomy . '_' . $id))
                    <h2>@php echo get_field('taxonomy_subtitle', $term->taxonomy . '_' . $id) @endphp</h2>
                @endif
                <span class="utk-volume--title--intro">@php print $term->description; @endphp</span>
            </div>
        </div>
    </div>
    @php
        print get_the_post_thumbnail($featured_item, 'hero_image');
    @endphp
</div>