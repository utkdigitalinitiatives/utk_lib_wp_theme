@php

Use \UTKLibrary\Library\Models\Employment;

$size = 'post-thumbnail';
$thumbnail  = get_the_post_thumbnail_url($post->ID,$size);
$dateline   = date('F j, Y', strtotime($post->post_date));

$category_id        = get_field('employment_category');
$category           = get_term($category_id);
$description        = get_field('employment_description');
$department_id      = get_field('employment_department');
$department         = get_term($department_id);

// check this...
$application_url    = get_field('employment_application_url');

$new = Employment::is_position_new($dateline);
$continue = '...';

@endphp

<article @php post_class() @endphp>
    <div class="article--context">
        <header class="article--header">
            <h2 class="article--header--title entry-title">
                <a href="@php the_permalink() @endphp">
                    @php the_title() @endphp
                    @if($new)
                        <span class="article--header--title--new">New</span>
                    @endif
                </a>
            </h2>
        </header>
        <main class="article--employment-teaser--main">
            <div class="article--employment-teaser--main--description">
                <p>@php echo wp_trim_words($description, '30', $continue) @endphp</p>
                <a href="{{get_the_permalink()}}" class="btn btn-secondary">Read More</a>
                <a href="{{$application_url}}" class="btn btn-secondary btn-outline">Apply</a>
            </div>
            <div class="article--meta article--employment-teaser--main--meta">
                <span><strong>Posted</strong> @php echo $dateline @endphp</span>
                <span><strong>Position Type</strong> @php echo $category->name @endphp</span>
                <span><strong>Department</strong> @php echo $department->name @endphp</span>
            </div>
        </main>
    </div>
    @if($thumbnail)
        @include('partials.components.post-thumbnail')
    @endif
</article>
