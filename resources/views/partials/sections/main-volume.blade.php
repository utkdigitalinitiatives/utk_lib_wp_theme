<div id="detach-sticky-top"></div>
<div class="utk-formal--header--background">
    <div class="utk-volume--title">
        <div class="container">
            <span class="utk-volume--title--series">Boundless Series</span>
            <h1>@php echo get_the_title() @endphp</h1>
            <span class="utk-volume--title--intro">RB Morries donec venenatis risus at ligula vestibulum malesuada. Mauris vitae orci. </span>
        </div>
    </div>
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
