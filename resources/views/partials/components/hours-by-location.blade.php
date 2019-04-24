@php

$base = 'https://api3.libcal.com/api_hours';
$type = 'today.php';
$iid = '968'; // this is our library id
$format = 'json';

$url = $base . '_' . $type . '?iid=' . $iid . '&format=' . $format;

$todaysdate = date('l, F d');
$location = get_option('options_site_hours_site_hours_lid');

@endphp

@if (strlen($url)!=0 && $location > -1 && $location < 8)

    @php
        $response = json_decode(file_get_contents($url));
        $headers = $http_response_header;
        $hoursPage = get_permalink(get_option('options_site_hours_site_hours_page'));
        $hoursRange = $response->locations[$location]->rendered;
    @endphp

    @if ($headers[0] === 'HTTP/1.1 200 OK')
        <a class="utk-hours--today" href="@php echo $hoursPage @endphp">
            <span class="utk-hours--today--label">
                Hours Today
            </span>
            <span class="utk-hours--today--range">
                @php echo $hoursRange @endphp
            </span>
       </a>
    @endif
    
@endif