@php
    $size = 'callout_image';
    $image_post_id = $callout['fields']['callout_media']['callout_image']['id'];
    $image  = wp_get_attachment_image($image_post_id, $size);
@endphp
<div class="utk-callout--inner">
    <div class="utk-callout--content">
        <h3>@php echo $callout['fields']['callout_headline']; @endphp</h3>
        <div class="utk-callout--content--paragraphs">@php echo $callout['fields']['callout_body']; @endphp</div>
    </div>
    <figure class="utk-callout--image">@php echo $image @endphp</figure>
</div>