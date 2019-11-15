@php

  use UTKLibrary\Library\Core\Model;

  $site = 'https://volumes.lib.utk.edu';
  $endpoint = $site . '/wp-json/model/recent?type=post&count=8&status=publish';
  $news = Model::utk_lib_get_recent_posts($endpoint);

@endphp

<div class="section-news news-wrap">

  <div class="section-news--header">
    <h3 class="section-news--header--title">Recent News</h3>
    <a class="section-news--header--url" href="@php echo $site . '/news'; @endphp">More News</a>
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

</div>
