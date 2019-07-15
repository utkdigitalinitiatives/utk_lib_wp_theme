@php
    $size = 'post-thumbnail';
    $thumbnail  = get_the_post_thumbnail_url($post->ID,$size);
    $dateline   = date('F j, Y', strtotime($post->post_date));

    $categories = get_the_category_list();

@endphp
<div class="page-body--content--inner">
  @if(get_the_title())
    <div class="page-body--content--title">
      <h1>@php echo get_the_title(); @endphp</h1>
    </div>
    <div class="article--meta article--meta-excerpt">
        <div class="page-body-blog--meta">
            <span>{{$dateline}}</span>
        </div>
        <div class="article--meta article--meta-categories">
            @php echo get_the_category_list() @endphp
        </div>
    </div>
  @endif
  <div class="page-body--content--body">
    @php the_content() @endphp
  </div>
</div>