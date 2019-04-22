<!doctype html>
<html {!! get_language_attributes() !!}>
@include('partials.head')
<body @php body_class() @endphp>
@php do_action('get_header') @endphp
@include('partials.header')
<div id="utk-lib-main" role="document">
  <section class="utk-section section-main content">
    @yield('content')
  </section>
</div>
@php do_action('get_footer') @endphp
@include('partials.footer')
@include('partials.triggers')
@php wp_footer() @endphp
</body>
</html>
