@include('partials.components.breadcrumb')
@php ecms_alpha_menu() @endphp
<div class="container page-body--container">
    <div class="page-body--flex">
        <main class="page-body--content">
            @include('volopedia.partials.content-volopedia')
        </main>
    </div>
    <div id="detach-sticky-bottom"></div>
</div>