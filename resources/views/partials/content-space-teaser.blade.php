@php

    $location = wp_get_post_terms(get_the_ID(), 'location', array("fields" => "all"));

@endphp
<article @php post_class() @endphp>
    <a class="article--trigger"
       id="article-formal-@php echo get_the_ID() @endphp"
       data-type="@php echo get_post_type() @endphp"
       data-id="@php echo get_the_ID() @endphp"
       href="@php the_permalink() @endphp">
        <div class="article--context">
            <span class="article--close"><span class="icon-cancel"></span></span>
            <div class="article--grid--image"
                 href="@php the_permalink() @endphp">
                <figure>
                    <span></span>
                </figure>
                <div class="article--grid--image--overlay"></div>
            </div>
            <header class="article--header">
                <h2 class="article--header--title entry-title">
                    @php the_title() @endphp
                </h2>
                <div class="article--meta article--meta-excerpt">
                    <div class="article--meta article--meta-categories">
                        <span class="article--meta-categories--dimple"></span>
                        @php print $location[0]->name @endphp
                    </div>
                </div>
            </header>
        </div>
    </a>
    <div class="article--populate article--populate-@php echo get_the_ID() @endphp"></div>
</article>
