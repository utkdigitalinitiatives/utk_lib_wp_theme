<!DOCTYPE html>
<html {!! get_language_attributes() !!}>
@include('partials.head')
<body @php body_class() @endphp>
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MB99NS"
            height="0"
            width="0"
            style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
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

<div class="utk-modal-overlay"></div>

@php wp_footer() @endphp

</body>
</html>
