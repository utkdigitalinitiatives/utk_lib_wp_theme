@if(is_page())
    @php $title = get_the_title(); @endphp
@elseif(is_archive())
    @php $title = post_type_archive_title( '', false ); @endphp
@endif
<header id="utk-lib-header"
        data-page-title="@php echo $title; @endphp"
        data-url="@php echo network_site_url(); @endphp">
    @include('partials.header-noscript')
</header>
