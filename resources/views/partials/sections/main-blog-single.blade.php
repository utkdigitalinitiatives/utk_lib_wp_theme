<div id="detach-sticky-top"></div>
@include('volumes.components.single-masthead')
<div class="container page-body--container">
    <span>News</span>
    <div class="page-body--flex">
        <aside class="page-body--aside">
            @include('partials.sidebar-single')
        </aside>
        <main class="page-body--content">
            @include('partials.content-post-blog-single')
        </main>
    </div>
    <div id="detach-sticky-bottom"></div>
</div>
