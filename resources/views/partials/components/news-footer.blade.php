@php

  use UTKLibrary\Library\Core\Model;

  // hardcode the blog_id for news posts
  $blog_id = 46;

  // set wp_query args
  $args = [
    'post_type' => 'post',
    'posts_per_page' => 8
  ];

  // get news posts
  $news = Model::utk_library_wp_query($blog_id, $args);

@endphp

<div class="section-news news-wrap">

  <div class="section-news--header">
    <h3 class="section-news--header--title">Recent News</h3>
    <a class="section-news--header--url" href="@php echo get_home_url($blog_id); @endphp">More News</a>
  </div>

  @if($news)


    <ul class="news-wrap--list">
      @while ($news->have_posts())
        @php $news->the_post() @endphp
        <li class="news-wrap--list--item">
          <a href="@php echo get_the_permalink() @endphp">@php echo get_the_title() @endphp</a>
        </li>
      @endwhile
    </ul>

  @else

    <p class="section-news--no-result">No recent news.</p>

  @endif

  @php( wp_reset_query() )

</div>
