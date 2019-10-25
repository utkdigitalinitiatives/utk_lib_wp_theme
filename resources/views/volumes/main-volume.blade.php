<div id="detach-sticky-top"></div>
@include('volumes.components.volume-masthead')
@include('partials.components.breadcrumb')
<div class="container page-body--container">
    <div class="page-body--flex">
        <aside class="page-body--aside">
            @include('partials.sidebar')
        </aside>
        <main class="page-body--content">
            @include('volumes.content-volume')
        </main>
    </div>
    <div id="detach-sticky-bottom"></div>
</div>
