<div id="detach-sticky-top"></div>
@include('partials.components.breadcrumb')
<div class="container page-body--container">
    <div class="page-body--flex">
        <main class="page-body--content page-body--content-formal">
            @include('partials.content-'.get_post_type())
        </main>
    </div>
    <div id="detach-sticky-bottom"></div>
</div>
