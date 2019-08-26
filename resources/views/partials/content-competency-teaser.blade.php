@php

$model = wp_get_post_terms(get_the_ID(), 'competency_models', array("fields" => "all"))

@endphp

<article @php post_class() @endphp>
    <div class="article--context">
        <a  class="article--grid--image"
            href="@php the_permalink() @endphp">
            <figure></figure>
            <div class="article--grid--image--overlay"></div>
        </a>
        <header class="article--header">
            <h2 class="article--header--title entry-title">
                <a href="@php the_permalink() @endphp">@php the_title() @endphp</a>
            </h2>
            <div class="article--meta article--meta-excerpt">
                <div class="article--meta article--meta-categories">
                    @php print $model[0]->name @endphp
                </div>
            </div>
        </header>
    </div>
</article>
