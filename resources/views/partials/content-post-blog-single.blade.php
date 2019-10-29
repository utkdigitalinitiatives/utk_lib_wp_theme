@php

Namespace App\Controllers;

@endphp
<div class="page-body--content--inner">
    <div class="page-body--content--title">
        @php
            $dateline2   = $post->post_modified;
            $dateline   = date('F j, Y', strtotime($post->post_date));
            $avatar     = get_avatar_data(get_post_meta($post->post_author));
            $author     = get_the_author_meta('display_name', $post->post_author);
            $estimate   = App::estimateReadTime($post->post_content)
        @endphp
        <span class="utk-heading-1" role="heading" aria-level="1">@php echo get_the_title(); @endphp</span>
        <div class="page-body-blog--article">
            <div class="page-body-blog--meta" style="font-size: 13px">
                <span>{{$dateline}}</span>
            </div>
        </div>
    </div>
    <div class="page-body--content--body">
        @php the_content() @endphp
        @php echo App::renderEndDots() @endphp
    </div>
</div>
