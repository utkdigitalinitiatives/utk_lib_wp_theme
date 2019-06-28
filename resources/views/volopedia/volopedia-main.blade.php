<div id="utk-lib-main" role="document">
    <section class="utk-section section-main content">
        @if (is_front_page())
            @include('volopedia.main-volopedia-home')
        @else
            @yield('content')
        @endif
    </section>
</div>