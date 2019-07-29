@php

    Namespace App\Controllers;

@endphp
@php

    $related = App::utkGetSingleAside(get_the_ID(), 5);

@endphp
<div class="utk-aside--widget utk-aside--widget--related-posts">
    <h3>Related Posts</h3>
    <ul>
        <?php while ($related->have_posts()) : $related->the_post(); ?>
            <li><a href="@php echo get_the_permalink() @endphp"><?php the_title(); ?></a></li>
        <?php endwhile; ?>
    </ul>
</div>
@php
    wp_reset_postdata();
@endphp