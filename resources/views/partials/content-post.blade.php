@php

  $size = 'post-thumbnail';
  $thumbnail  = get_the_post_thumbnail_url($post->ID,$size);
  $dateline   = date('F j, Y', strtotime($post->post_date));

@endphp

<article @php post_class() @endphp>
  <div class="article--context">
    <header class="article--header">
      <h2 class="article--header--title entry-title">
        <a href="@php the_permalink() @endphp">@php the_title() @endphp</a>
      </h2>
      <div class="article--meta article--meta-excerpt">
        <div class="page-body-blog--meta">
          <span>{{$dateline}}</span>
        </div>
      </div>
    </header>
    <div class="article--body">
      <div class="article--body--summary entry-summary">
        @php the_excerpt() @endphp
      </div>
    </div>
  </div>
  @if($thumbnail)
    @include('partials.components.post-thumbnail')
  @endif
</article>
