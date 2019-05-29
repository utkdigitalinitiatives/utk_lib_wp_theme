<div id="utk-lib-main" role="document">
    <section class="utk-section section-main content">
        @if (is_main_site() && is_front_page())
            @include('partials.sections.front')
        @else
            @yield('content')
        @endif
    </section>
</div>