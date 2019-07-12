@php
    $captionEnabled = $fields['fields']['callout_media']['callout_image_caption'];
    $captionLink = $fields['fields']['callout_media']['callout_image_caption_link'];
@endphp
@if( ! empty( $image ) )
    @if( ! empty( isset($image['caption']) && ! empty( $image['caption'] ) && $captionEnabled === true ) )
        <div class="utk-image--caption">
            <span>@php echo $image['caption'] @endphp</span>
            @if( ! empty($captionLink) )
                <a href="@php echo $captionLink; @endphp"><strong>More</strong> <span class="icon-right-big"></span></a>
            @endif
        </div>
    @endif
@endif