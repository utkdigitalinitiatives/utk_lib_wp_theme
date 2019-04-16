@php
    $size = 'callout_image';
    $image_post_id = $callout['fields']['callout_media']['callout_image']['id'];
    $image  = wp_get_attachment_image($image_post_id, $size);
    $orientation = $callout['fields']['callout_orientation'];
@endphp
<div class="utk-callout--inner utk-callout--orientation-{{$orientation}}">
    <div class="utk-callout--content">
        <h3>@php echo $callout['fields']['callout_content']['callout_headline']; @endphp</h3>
        <div class="utk-callout--content--paragraphs">@php echo $callout['fields']['callout_content']['callout_body']; @endphp</div>
    </div>
    <figure class="utk-callout--image">@php echo $image @endphp</figure>
</div>