@php
    if ($button['link_type'] === 'page') {
        $url = $button['link_page'];

    } else if ($button['link_type'] === 'url') {
        $url = $button['link_url'];

    } else {
        $url = null;
    }
@endphp
<div class="utk-button-{{$button['link_type']}}">
    <a class="btn" href="{{$url}}">@php echo $button['link_button_text']@endphp</a>
</div>