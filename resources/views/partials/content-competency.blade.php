@php

    use App\Controllers\Formal;

    $post_id = get_the_ID();
    $post_type = get_post_type();
    $post_title = get_the_title($post_id);

    $post = Formal::getFormalPost($post_id, $post_type);

    $archive = get_post_type_archive_link($post_type);
    $archive_populate = esc_url_raw($archive . '?title=' . sanitize_title($post_title) . '&populate=' . $post_id . '&type=' . $post_type);

    if (is_archive()) :
        print $post;
    else :
        header('Location: ' . $archive_populate);
    endif;

@endphp
