@php

Namespace App\Controllers;

@endphp

@if(get_field('formal_facets', 'option'))

    <div class="page-body--aside--facets">

        @if(have_rows('formal_facets', 'options'))
            @while ( have_rows('formal_facets', 'options') )

                @php
                    the_row();
                    $facet = get_sub_field('selected_facet', 'options');
                @endphp

                <div class="page-body--aside--facets--item page-body--aside--facets--item-@php print strtolower(sanitize_html_class($facet)); @endphp">
                    @php echo facetwp_display('facet', $facet); @endphp
                </div>

            @endwhile
        @endif

    </div>

@endif