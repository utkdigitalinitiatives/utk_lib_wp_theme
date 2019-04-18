@php
$base = 'https://api3.libcal.com/api_hours';
$type = 'today.php';
$iid = '968';
$format = 'json';

$url = $base . '_' . $type . '?iid=' . $iid . '&format=' . $format;

$todaysdate = date('l, F d');

$location = '3';

//plenty of error checking and making sure that only valid location numbers are picked
if (strlen($url)!=0 && $location > -1 && $location < 8) {

    $response = json_decode(file_get_contents($url));
    $headers = $http_response_header;

    if ($headers[0] === 'HTTP/1.1 200 OK') {

        echo 'Hours Today: ';

        $hours_today = ($response ->locations[$location]->rendered);

        echo $hours_today;

    } else echo "There has been an error";  // if the API doesn't connect
}
else {
    echo "No location"; // if  the location isn't valid
}
@endphp