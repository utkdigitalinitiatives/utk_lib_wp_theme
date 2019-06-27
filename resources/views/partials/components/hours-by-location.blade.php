@php

    // get lid for location
    $location = get_option('options_site_hours_site_hours_lid');

    $base = 'https://api3.libcal.com/api_hours';
    $type = 'today.php';
    $iid = '968'; // UT Libraries iid
    $format = 'json';

    $url = $base . '_' . $type . '?iid=' . $iid . '&format=' . $format . '&lid=' . $location ;

@endphp

@if (strlen($url)!=0 && $location >= 0)

    @php
        $response = json_decode(file_get_contents($url));
        $headers = $http_response_header;
        $hoursPage = get_permalink(get_option('options_site_hours_site_hours_page'));
        $accentColor = get_option('options_site_accent_color');
        $hoursRange = $response->locations[0]->rendered;
        $hoursImage = get_field('site_hours_site_hours_background_image', 'option');
        $hoursImageRender = wp_get_attachment_image_src($hoursImage['ID'], 'medium')[0];

        if ($accentColor !== 'default' || $accentColor !== null) :
            $setAccentColor = '#' . $accentColor;
        else :
            $setAccentColor = '#333333';
        endif;
    @endphp

    @if ($headers[0] === 'HTTP/1.1 200 OK' && isset($response->locations))

        @php

            $hoursRangeClass = 'utk-hours--today--range';

            if ($response->locations[0]->times->currently_open) {
                $hoursRangeClass .= ' utk-hours--open';
            } else {
                $hoursRangeClass .= 'utk-hours--closed';
            }

        @endphp

        @php
            // prep gradients
            $start = '#333333';
            $startPercent = '49.999999%';
            $end = $setAccentColor;
            $endPercent = '50%';
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
                            @php echo $hoursRange @endphp
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
                                background: linear-gradient(to right, {{$start}} {{$startPercent}}, {{$end}} {{$endPercent}});">
                            <a href="@php echo $hoursPage @endphp">
                                <em>More Hours</em>
                                <span class="icon-right-big"></span>
                            </a>
                        </div>
                        <div class="utk-hours--more--image"
                             style="background-image: url('@php print $hoursImageRender; @endphp')"></div>
                    </div>
                </div>
            </div>
        </section>
    @endif

@endif