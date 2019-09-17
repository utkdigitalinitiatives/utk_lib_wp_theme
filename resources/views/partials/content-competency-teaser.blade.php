@php

    $model = wp_get_post_terms(get_the_ID(), 'competency_models', array("fields" => "all"));

    $term_id = $model[0]->term_id;

    $term_svg = get_term_meta($term_id, 'taxonomy_svg', 1);
    $term_color = get_term_meta($term_id, 'taxonomy_color', 1);

    if ($term_color === 'default')
        $term_color = '58595b';

    $term_color_style = '#' . $term_color . ';';

    $words = preg_split("/[\s,_-]+/", get_the_title());
    $acronym = "";

    $exclude = [
        '&',
        'a'
    ];

    foreach ($words as $w) {
        if (!in_array($w[0], $exclude)) {
            $acronym .= $w[0];
        }
    }

    $acronym = strtoupper(substr($acronym, 0, 3))



@endphp

<article @php post_class() @endphp>
    <a class="article--trigger"
       id="article-formal-@php echo get_the_ID() @endphp"
       data-type="@php echo get_post_type() @endphp"
       data-id="@php echo get_the_ID() @endphp"
       href="@php the_permalink() @endphp">
        <div class="article--context">
            <span class="article--close"><span class="icon-cancel"></span></span>
            <div class="article--grid--image article--grid--image-border"
                 style="background-color: {{$term_color_style}}"
                 href="@php the_permalink() @endphp">
                <figure>
                    <h2>
                        @php the_title() @endphp
                    </h2>
                </figure>
            </div>
        </div>
    </a>
    <div class="article--populate article--populate-@php echo get_the_ID() @endphp"></div>
</article>
