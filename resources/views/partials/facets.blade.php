@php

Namespace App\Controllers;

@endphp

@if(get_field('site_facetwp_site_facetwp_enable', 'option'))

    <div class="page-body--aside--facets">

        @if(have_rows('site_facetwp_site_facetwp_facets', 'options'))
            @while ( have_rows('site_facetwp_site_facetwp_facets', 'options') )

                @php
                    the_row();
                    $facet = get_sub_field('site_facetwp_select', 'options');
                    $label = get_sub_field('site_facetwp_label', 'options');
                @endphp

                @if ($label !== 'Volopedia A-Z')
                    <div class="page-body--aside--facets--item">
                        <h4>@php echo $label; @endphp</h4>
                        @php echo facetwp_display('facet', $facet); @endphp
                    </div>
                @endif

            @endwhile
        @endif

    </div>

@endif