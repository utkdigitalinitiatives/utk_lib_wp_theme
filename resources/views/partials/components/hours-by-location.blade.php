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
        $hoursRange = $response->locations[0]->rendered;
        $hoursImage = get_field('site_hours_site_hours_background_image', 'option');
        $hoursImageRender = wp_get_attachment_image_src($hoursImage['ID'], 'medium')[0];
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
        <section class="utk-hours-section">
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
                    <div class="utk-hours--more">
                        <div class="utk-hours--more--image" style="background-image: url('@php print $hoursImageRender; @endphp')"></div>
                        <div class="utk-hours--more--overlay">
                            <a href="@php echo $hoursPage @endphp">
                                <em>More Hours</em>
                                <span class="icon-right-big"></span>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    @endif

@endif