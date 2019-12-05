@php

Namespace App\Controllers;

@endphp
<div class="page-body--content--inner">
    <div class="page-body--content--inner--interactions">
        <a href="@php echo get_post_type_archive_link('space') @endphp" class="utk-space--back">Back to Spaces</a>
    </div>
    <div class="page-body--content--body page-body--content--body--sub">
        @include('partials.content-space')
    </div>
</div>
