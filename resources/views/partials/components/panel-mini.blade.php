@php
    $allowedSites = [
        24 => [
            ['id' => 39783, 'title' => 'Agriculture'],
            ['id' => 39811, 'title' => 'Veterinary Medicine'],
            ['id' => 39812, 'title' => 'Music']
        ],
        25 => [
            ['id' => 39812, 'title' => 'Music']
        ]
    ];
    $onesearchLogo = \App\asset_path('images/ut-onesearch.svg');
@endphp
@if (is_front_page() && array_key_exists(get_current_blog_id(), $allowedSites))
    <div id="utk-panel-mini" data-subjects='@php print json_encode($allowedSites[get_current_blog_id()]) @endphp'></div>
@endif