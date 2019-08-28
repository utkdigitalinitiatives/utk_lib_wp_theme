@php

    use App\Controllers\Formal;

    $post_id = get_the_ID();
    $post_type = get_post_type();

    $post = Formal::getFormalPost($post_id, $post_type);

    print $post;

@endphp

