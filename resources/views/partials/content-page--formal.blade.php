@php

Namespace App\Controllers;

$formal_type = get_field('formal_type', null, false);

if (strtolower($formal_type) === 'page') :
    $formal_header = get_field('formal_header', null, false);
else :
    $formal_header = get_the_ID();
endif;

@endphp
<div class="page-body--content--inner">
    @php print \Formal::getFormalHeader($formal_header) @endphp
    <div class="page-body--content--body page-body--content--body--sub">
        @php the_content() @endphp
    </div>
</div>
