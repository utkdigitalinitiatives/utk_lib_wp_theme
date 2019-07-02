@php
    $allowedSites = [
        91
    ];
@endphp
<div id="detach-sticky-top"></div>
@php
    $hoursbyLocation = get_option('options_site_hours_site_hours_on');
@endphp
@if ($hoursbyLocation)
    @include('partials.components.hours-by-location')
@endif
@if (in_array(get_current_blog_id(), $allowedSites))
    @include('partials.components.search-options')
@else
    @include('partials.components.breadcrumb')
@endif
<div class="container page-body--container">
    <div class="page-body--flex">
        <main class="page-body--content">
            @include('partials.components.google-custom-search')
            @include('partials.components.panel-mini')
            @include('partials.content-'.get_post_type())
        </main>
    </div>
    <div id="detach-sticky-bottom"></div>
</div>
