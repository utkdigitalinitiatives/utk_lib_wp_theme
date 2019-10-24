<div id="detach-sticky-top"></div>
<div class="utk-formal--header--background">
    @php
        $background = wp_get_attachment_image(832, 'hero_image');
        print $background;
    @endphp
</div>
@include('partials.components.breadcrumb')
<div class="container page-body--container">
    <div class="page-body--flex">
        <aside class="page-body--aside page-body--aside-hidden">
            @include('partials.sidebar')
        </aside>
        <main class="page-body--content page-body--content-formal">
            @if (get_post_type() === 'space')
                @include('partials.content-space--formal')
            @else
                @include('partials.content-page--formal')
            @endif
        </main>
    </div>
    <div id="detach-sticky-bottom"></div>
</div>
