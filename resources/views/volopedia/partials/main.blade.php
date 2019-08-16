<div id="detach-sticky-top"></div>
<div class="container page-body--container">
    @include('partials.components.notice')
    <div class="page-body--flex">
        <aside class="page-body--aside">
            @include('partials.sidebar')
        </aside>
        <main class="page-body--content">
            @include('partials.content-'.get_post_type())
        </main>
    </div>
    <div id="detach-sticky-bottom"></div>
</div>
