@php

Namespace App\Controllers;

$facets = 'formal_facets__' . get_post_type();

@endphp

@if(get_field($facets, 'option'))
    <div class="page-body--aside--facets">
        @if(have_rows($facets, 'options'))
            <div class="utk-facets--label">
                <span class="utk-facets--label-data utk-facets--label-meta"></span>
                <span class="utk-facets--label-data utk-facets--label-string"></span>
            </div>
            <div class="utk-facets--tray">
                <button class="utk-facets--button utk-facets--toggle">
                    Filter Competencies
                </button>
                <button class="utk-facets--button utk-facets--reset">
                    Reset
                </button>
            </div>
            <div class="utk-facets--modal">
                <button class="utk-facets--close">
                    Close
                </button>
                @while ( have_rows($facets, 'options') )

                    @php
                        the_row();
                        $facet = get_sub_field('selected_facet', 'options');
                        $hidden = get_sub_field('hidden', 'options');
                        $label = get_sub_field('selected_facet_label', 'options');
                    @endphp

                    <div @if($hidden)style="display: none;" @endif  class="page-body--aside--facets--item page-body--aside--facets--item-@php print strtolower(sanitize_html_class($facet)); @endphp ">
                        <h4>@php echo $label; @endphp</h4>
                        @php echo facetwp_display('facet', $facet); @endphp
                    </div>

                @endwhile
            </div>
        @endif
    </div>

@endif