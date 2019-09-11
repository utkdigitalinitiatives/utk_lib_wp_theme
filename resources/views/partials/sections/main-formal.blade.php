<div id="detach-sticky-top"></div>
@include('partials.components.breadcrumb')
<div class="container page-body--container">
    <div class="page-body--flex">
        <aside class="page-body--aside page-body--aside-hidden">
            @include('partials.sidebar')
        </aside>
        <main class="page-body--content page-body--content-formal">
            @include('partials.content-page--formal')
        </main>
    </div>
    <div id="detach-sticky-bottom"></div>
</div>
