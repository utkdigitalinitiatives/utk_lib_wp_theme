@php

    Namespace App\Controllers;

    $formal_type = get_field('formal_type', null, false);

    if (strtolower($formal_type) === 'page') :
        $formal_header = get_field('formal_header', null, false);
    else :
        $formal_header = get_the_ID();
    endif;

@endphp
<div id="detach-sticky-top"></div>
@php print \Formal::getFormalHeader($formal_header) @endphp
{{--@include('partials.components.breadcrumb')--}}
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
