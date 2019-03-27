@php

Namespace App\Controllers;

$avatar     = get_avatar_data(get_post_meta('author'));
$author     = get_the_author_meta('display_name');
$estimate   = App::estimateReadTime($post->post_content)

@endphp
<div class="page-body--content--inner">
    <div class="page-body--content--title">
        <h1>@php echo get_the_title(); @endphp</h1>
        <img src="{{$avatar['url']}}" />
        {{$author}}
        {{$estimate}} minute read
    </div>
    <div class="page-body--content--body">
        @php the_content() @endphp
    </div>
</div>
