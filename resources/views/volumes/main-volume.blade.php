<div id="detach-sticky-top"></div>
@include('volumes.components.volume-masthead')
<div class="container page-body--container">
    <div class="page-body--flex page-body--flex-volumes">
        <main class="page-body--content page-body--content-volumes">
            @include('volumes.content-volume')
        </main>
        <aside class="page-body--aside">
            @include('partials.sidebar')
        </aside>
    </div>
    <div id="detach-sticky-bottom"></div>
</div>
