<div id="detach-sticky-top"></div>
<div class="utk-formal--header--background">
    @php
        print get_the_post_thumbnail(null, 'hero_image');
    @endphp
</div>
@include('partials.components.breadcrumb')
<div class="container page-body--container">
    <div class="page-body--flex">
        <aside class="page-body--aside">
            @include('partials.sidebar')
        </aside>
        <main class="page-body--content">
            @include('partials.content-volume')
        </main>
    </div>
    <div id="detach-sticky-bottom"></div>
</div>
