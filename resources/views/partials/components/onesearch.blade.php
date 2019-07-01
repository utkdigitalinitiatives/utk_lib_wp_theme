@php
    $allowedSites = [
        24, // agvet
        25  // music
    ];
    $onesearchLogo = \App\asset_path('images/ut-onesearch.svg');
@endphp
@if (is_front_page() && in_array(get_current_blog_id(), $allowedSites))
    <div id="utk-panel-mini"></div>
@endif