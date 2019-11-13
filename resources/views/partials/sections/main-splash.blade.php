@php

    Namespace App\Controllers;

    $featured_item = Volumes::getFeaturedVolume('boundless');

@endphp
<div id="detach-sticky-top"></div>
@include('volumes.components.splash-masthead')
{{--@include('partials.components.breadcrumb')--}}
<div class="container page-body--container">
    <div class="page-body--flex page-body--flex-volumes">
        <aside class="page-body--aside page-body--aside-hidden">
            @include('partials.sidebar')
        </aside>
        <main class="page-body--content page-body--content-formal page-body--content-splash">
            @include('volumes.components.splash-feature')
        </main>
    </div>
    <div id="detach-sticky-bottom"></div>
</div>
@include('volumes.components.splash-volume-secondary')
