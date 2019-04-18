@php
$base = 'https://api3.libcal.com/api_hours';
$type = 'today.php';
$iid = '968'; // this is our library id
$format = 'json';

$url = $base . '_' . $type . '?iid=' . $iid . '&format=' . $format;

$todaysdate = date('l, F d');

$location = get_option('options_site_hours_site_hours_lid');

//plenty of error checking and making sure that only valid location numbers are picked
if (strlen($url)!=0 && $location > -1 && $location < 8) {

    $response = json_decode(file_get_contents($url));
    $headers = $http_response_header;

    if ($headers[0] === 'HTTP/1.1 200 OK') {

        echo '<div class="utk-hours--today">';

        echo '<span class="utk-hours--today--label">Hours Today</span>';

        $hours_today = ($response ->locations[$location]->rendered);

        echo '<span class="utk-hours--today--range">' . $hours_today . '</span>';

        echo '</div>';

    } else echo "There has been an error";  // if the API doesn't connect
}
else {
    echo "No location"; // if  the location isn't valid
}
@endphp