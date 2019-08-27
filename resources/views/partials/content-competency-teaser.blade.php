@php

    $model = wp_get_post_terms(get_the_ID(), 'competency_models', array("fields" => "all"));

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
       data-id="@php echo get_the_ID() @endphp"
       href="@php the_permalink() @endphp">
        <div class="article--context">
            <div class="article--grid--image"
                 href="@php the_permalink() @endphp">
                <figure>
                    <span>{{$acronym}}</span>
                </figure>
                <div class="article--grid--image--overlay"></div>
            </div>
            <header class="article--header">
                <h2 class="article--header--title entry-title">
                    @php the_title() @endphp
                </h2>
                <div class="article--meta article--meta-excerpt">
                    <div class="article--meta article--meta-categories">
                        @php print $model[0]->name @endphp
                    </div>
                </div>
            </header>
        </div>
    </a>
    <div class="article--populate article--populate-@php echo get_the_ID() @endphp">@php the_title() @endphp</div>
</article>
