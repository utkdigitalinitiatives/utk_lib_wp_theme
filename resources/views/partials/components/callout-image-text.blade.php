@php

    // styling
    $orientation = $fields['fields']['callout_orientation'];
    $containerStyle = $fields['fields']['callout_style'];

    // media
    $render_size = 'card_image';
    $preload_size = 'preload_gr_horz';
    $image_post_id = $fields['fields']['callout_media']['callout_image']['id'];
    $image  = $fields['fields']['callout_media']['callout_image'];
    $srcset = wp_get_attachment_image_srcset($image_post_id, 'card_image');

@endphp
<div class="utk-callout--inner utk-callout--style-{{$containerStyle}} utk-callout--orientation-{{$orientation}}">
    <div class="utk-callout--content">
        <h3>@php echo $fields['fields']['callout_content']['callout_headline']; @endphp</h3>
        <div class="utk-callout--content--paragraphs">@php echo $fields['fields']['callout_content']['callout_body']; @endphp</div>
        @if($fields['fields']['link'])
            @php $buttonFields = $fields['fields']['link']; @endphp
            @include('partials.components.button')
        @endif
    </div>
    <div class="utk-callout--image">
        @include('partials.components.image-caption')
        @include('partials.components.image')
    </div>
</div>
