@php

Namespace App\Controllers;
$btn = Button::buildButton($buttonFields, $containerStyle);

@endphp
<div class="utk-button-{{$btn['type']}}">
    <a class="{{$btn['classes']}}" href="{{$btn['url']}}">
        @php echo $btn['text']@endphp
        @if($btn['has_icon'])
            <span class="icon-right-open"></span>
        @endif
    </a>
</div>
