@php

Namespace App;

$container = 'libchat_' . Controllers\App::getLibChatHash();

@endphp
<div id="{{$container}}" class="utk-libchat"></div>