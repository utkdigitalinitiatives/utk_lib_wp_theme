@php
    // styling
    $orientation = $fields['fields']['callout_orientation'];
    $style = $fields['fields']['callout_style'];
    // media
    $size = 'callout_image';
    $image_post_id = $fields['fields']['callout_media']['callout_image']['id'];
    $image  = wp_get_attachment_image($image_post_id, $size);
@endphp
<div class="utk-callout--inner utk-callout--style-{{$style}} utk-callout--orientation-{{$orientation}}">
    <div class="utk-callout--content">
        <h3>@php echo $fields['fields']['callout_content']['callout_headline']; @endphp</h3>
        <div class="utk-callout--content--paragraphs">@php echo $fields['fields']['callout_content']['callout_body']; @endphp</div>
        @if($fields['fields']['link'])
            @php $button = $fields['fields']['link']; @endphp
            @include('partials.components.button')
        @endif
    </div>
    <figure class="utk-callout--image">@php echo $image @endphp</figure>
</div>
