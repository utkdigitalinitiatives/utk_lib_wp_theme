@php

    $size = 'callout_image';
    $thumbnail  = get_the_post_thumbnail_url($post->ID, $size);
    $dateline   = date('F j, Y', strtotime($post->post_date));

@endphp

<article @php post_class() @endphp>
    @if($thumbnail)
        <a href="@php the_permalink() @endphp">
            @include('partials.components.post-thumbnail')
        </a>
    @endif
    <div class="article--context">
        <header class="article--header">
            <h2 class="article--header--title entry-title">
                <a href="@php the_permalink() @endphp">@php the_title() @endphp</a>
            </h2>
            <div class="article--meta article--meta-excerpt">
                <div class="page-body-blog--meta">
                    <span>{{$dateline}}</span>
                </div>
                <div class="article--meta article--meta-categories">
                    @php echo get_the_category_list() @endphp
                </div>
            </div>
        </header>
        {{--<div class="article--body">--}}
            {{--<div class="article--body--summary entry-summary">--}}
                {{--@php the_excerpt() @endphp--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>
</article>
