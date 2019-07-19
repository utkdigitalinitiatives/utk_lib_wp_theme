@php

  use UTKLibrary\Library\Core\Model;

  // hardcode the blog_id for news posts
  $blog_id = 46;

  // set wp_query args
  $args = [
    'post_type' => 'post',
    'posts_per_page' => 8
  ];

  if (function_exists('switch_to_blog')) {
    switch_to_blog(46);
  }

  $endpoint = 'https://www.lib.utk.edu/news/wp-json/model/recent?type=post&count=8';
  $news = Model::utk_lib_get_recent_posts($args, $endpoint);

@endphp

<div class="section-news news-wrap">

  <div class="section-news--header">
    <h3 class="section-news--header--title">Recent News</h3>
    <a class="section-news--header--url" href="@php echo get_home_url($blog_id); @endphp">More News</a>
  </div>

  @if($news)

    <ul class="news-wrap--list">
      @foreach($news as $item)
        @php
          if (isset($item->url)) :
            $url = $item->url;
          else :
            $url = get_the_permalink($item->ID);
          endif;
        @endphp
        <li class="news-wrap--list--item">
          <a href="@php echo $url @endphp">@php echo $item->post_title @endphp</a>
        </li>
      @endforeach
    </ul>

  @else

    <p class="section-news--no-result">No recent news.</p>

  @endif

  @php

    if (function_exists('switch_to_blog')) {
      restore_current_blog();
    }

  @endphp

</div>
