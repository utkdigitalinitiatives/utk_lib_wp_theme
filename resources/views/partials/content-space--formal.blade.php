@php

Namespace App\Controllers;

@endphp
<div class="page-body--content--inner">
    @php print \Formal::getFormalHeader(get_the_ID(), true) @endphp
    <div class="page-body--content--inner--interactions">
        <button>Back Button</button>
    </div>
    <div class="page-body--content--body page-body--content--body--sub">
        @include('partials.content-space')
    </div>
</div>
