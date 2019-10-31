<div class="page-body--content--inner">
    <div class="utk-volume--teaser">
        <a href="{{get_the_permalink()}}">
            <div class="utk-volume--teaser--thumb">
            @php
                print get_the_post_thumbnail(null, 'card_image');
            @endphp
            </div>
            <div class="utk-volume--teaser--context">
                <span class="utk-volume--teaser--vol">Vol. 1 - 2018</span>
                <div class="utk-volume--teaser--title">@php echo get_the_title() @endphp</div>
            </div>
        </a>
    </div>
</div>
