@php

$size = 'post-thumbnail';
$thumbnail  = get_the_post_thumbnail_url($post->ID,$size);
$dateline   = date('F j, Y', strtotime($post->post_date));



$category_id        = get_field('employment_category');
$category           = get_term($category_id);
$pay_grade          = get_field('employment_pay_grade');
$salary             = get_field('employment_salary');
$hours              = get_field('employment_hours');
$location           = get_field('employment_location');
$salary             = get_field('employment_salary');
$salary             = get_field('employment_salary');
$description        = get_field('employment_description');
$responsibilities   = get_field('employment_responsibilities');
$qualifications_r   = get_field('employment_qualifications_required');
$qualifications_p   = get_field('employment_qualifications_preferred');
$environment        = get_field('employment_environment');
$benefits           = get_field('employment_benefits');
$instructions       = get_field('employment_instructions');

$appointment_rank   = get_field('employment_appointment_rank');
$department_id      = get_field('employment_department');
$department         = get_term($department_id);
$reports_tp         = get_field('employment_reports');
$available          = get_field('employment_available');

$application_url    = get_field('employment_application_url');

$continue = '...';

@endphp

<article @php post_class() @endphp>
    <div class="article--context">
        <header class="article--header">
            <h2 class="article--header--title entry-title">
                <a href="@php the_permalink() @endphp">@php the_title() @endphp</a>
            </h2>
        </header>
        <main class="article--employment-teaser--main">
            <div class="article--employment-teaser--main--description">
                <p>@php echo wp_trim_words($description, '30', $continue) @endphp</p>
                <a href="#" class="btn btn-secondary">Read More</a>
                <a href="#" class="btn btn-secondary btn-outline">Apply</a>
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
