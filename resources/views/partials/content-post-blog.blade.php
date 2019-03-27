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
        <h1>@php echo get_the_title(); @endphp</h1>

        <div>
            <div>{{$author}}</div>
            <div>
                <span>{{$dateline}}</span>
                <span>{{$estimate}} minute read</span>
            </div>
        </div>

    </div>
    <div class="page-body--content--body">
        @php the_content() @endphp
    </div>
</div>
