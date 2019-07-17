<!DOCTYPE html>
<html {!! get_language_attributes() !!}>
@include('partials.head')
<body @php body_class() @endphp>
@php do_action('get_header') @endphp
@include('partials.header')

<main>
    @if (UT_LIBRARIES_ENTITY === 'volopedia')
        @include('volopedia.volopedia-main')
    @else
        @include('partials.libraries-main')
    @endif
    @include('partials.global-midsection')
</main>

@php do_action('get_footer') @endphp
@include('partials.footer')
@php wp_footer() @endphp

</body>
</html>
