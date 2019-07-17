<!DOCTYPE html>
<html {!! get_language_attributes() !!}>
@include('partials.head')
<body @php body_class() @endphp>
@php do_action('get_header') @endphp
@include('partials.header')

@if (UT_LIBRARIES_ENTITY === 'volopedia')
    @include('volopedia.volopedia-main')
@else
    @include('partials.libraries-main')
@endif

@php do_action('get_footer') @endphp
@include('partials.footer')
@include('partials.triggers')
@php wp_footer() @endphp

</body>
</html>
