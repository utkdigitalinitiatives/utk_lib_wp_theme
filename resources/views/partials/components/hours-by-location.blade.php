@php

    $location = get_option('options_site_hours_site_hours_lid');
    $url = 'https://www.lib.utk.edu/wp-json/libcal/hours';

@endphp

@if ($location >= 0)

    @php
        $response = json_decode(file_get_contents($url));
        $hoursPage = get_permalink(get_option('options_site_hours_site_hours_page'));
        $accentColor = get_option('options_site_accent_color');
        $hoursImage = get_field('site_hours_site_hours_background_image', 'option');
        $hoursImageRender = wp_get_attachment_image_src($hoursImage['ID'], 'medium')[0];

        print_r ($hoursRange);

        if ($accentColor !== 'default' || $accentColor !== null) :
            $setAccentColor = '#' . $accentColor;
        else :
            $setAccentColor = '#333333';
        endif;
    @endphp

    @if (isset($response->locations->$location))

        @php

            // prep gradients
            $start = '#333333';
            $startPercent = '49.999999%';
            $end = $setAccentColor;
            $endPercent = '50%';

            $location = $response->locations->$location;
            $hoursRangeClass = 'utk-hours--today--range';

            if ($location->copen) {
                $hoursRangeClass .= ' utk-hours--open';
            } else {
                $setAccentColor = '#a7a9ac';
                $end = '#a7a9ac';
                $hoursRangeClass .= ' utk-hours--closed';
            }

        @endphp
        <section class="utk-hours-section"
                 style="
                    background: -moz-linear-gradient(left, {{$start}} {{$startPercent}}, {{$end}} {{$endPercent}});
                    background: -webkit-gradient(linear, left, bottom, color-stop({{$startPercent}}, {{$start}}), color-stop({{$endPercent}}, {{$end}}));
                    background: -webkit-linear-gradient(left, {{$start}} {{$startPercent}}, {{$end}} {{$endPercent}});
                    background: -o-linear-gradient(left, {{$start}} {{$startPercent}}, {{$end}} {{$endPercent}});
                    background: -ms-linear-gradient(left, {{$start}} {{$startPercent}}, {{$end}} {{$endPercent}});
                    background: linear-gradient(to right, {{$start}} {{$startPercent}}, {{$end}} {{$endPercent}});">
            <div class="container">
                <div class="utk-hours--wrap">
                    <a class="utk-hours--today" href="@php echo $hoursPage @endphp">
                        <span class="utk-hours--today--label">
                            Hours Today
                        </span>
                        <span class="{{$hoursRangeClass}}">
                            @php echo $location->hours @endphp
                        </span>
                    </a>
                    <div class="utk-hours--more" style="background-color: {{$setAccentColor}}">
                        @php
                            // prep gradients
                            $start = $setAccentColor . '00';
                            $startPercent = '0';
                            $end = $setAccentColor . 'FF';
                            $endPercent = '100%';
                        @endphp
                        <div class="utk-hours--more--overlay" style="
                                background: -moz-linear-gradient(left, {{$start}} {{$startPercent}}, {{$end}} {{$endPercent}});
                                background: -webkit-gradient(linear, left, bottom, color-stop({{$startPercent}}, {{$start}}), color-stop({{$endPercent}}, {{$end}}));
                                background: -webkit-linear-gradient(left, {{$start}} {{$startPercent}}, {{$end}} {{$endPercent}});
                                background: -o-linear-gradient(left, {{$start}} {{$startPercent}}, {{$end}} {{$endPercent}});
                                background: -ms-linear-gradient(left, {{$start}} {{$startPercent}}, {{$end}} {{$endPercent}});
                                background: linear-gradient(to right, {{$start}} {{$startPercent}}, {{$end}} {{$endPercent}});"></div>
                        <div class="utk-hours--more--image"
                             style="background-image: url('@php print $hoursImageRender; @endphp')"></div>
                    </div>
                </div>
            </div>
        </section>
    @endif

@endif