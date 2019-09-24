@php

Namespace App\Controllers;

$type = get_post_type();
$type_object = get_post_type_object($type);

$facets = 'formal_facets';

@endphp

@if(get_field($facets, 'option'))
    <div class="page-body--aside--facets">
        @if(have_rows($facets, 'options'))
            <div class="utk-facets--tray">
                <div class="utk-space--day-picker--select"
                     data-daypicker="show"
                     data-hours="none">
                </div>
                <div class="utk-facets--label">
                    <em>Showing</em>
                    <span class="utk-facets--label-data utk-facets--label-meta">all</span>
                    <em>{{$type_object->labels->name}}</em>
                    <span class="utk-facets--label-data utk-facets--label-string"></span>
                    <a href="#" class="utk-facets--toggle">Modify</a>
                </div>
                <div class="utk-facets--filter">
                    <button class="utk-facets--button utk-facets--reset">
                        Reset
                    </button>
                    <button class="utk-facets--button utk-facets--toggle">
                        Filter
                    </button>
                </div>
            </div>
            <div class="utk-facets--modal">
                <button class="utk-facets--button utk-facets--close"
                        aria-label="Close">
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
                @php wp_reset_query(); @endphp
            </div>
        @endif
    </div>

@endif