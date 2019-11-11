@php

    $term = get_terms(array('taxonomy' => 'volume_category'));
    $acf_id = $term[0]->taxonomy . '_' . $term[0]->term_id;
    $description = get_field('taxonomy_short_description', $acf_id);

@endphp
@if($description)
    <div class="utk-volume--about">
        <h3>About @php print $term[0]->name; @endphp</h3>
        <p class="utk-volume--about--description">@php print $description; @endphp</p>
        <a href="/@php print $term[0]->slug; @endphp">Learn More</a>
    </div>
@endif