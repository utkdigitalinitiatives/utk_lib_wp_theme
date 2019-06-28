@while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')
    @include('partials.components.breadcrumb')
    @php ecms_alpha_menu() @endphp
    {{----}}
@endwhile