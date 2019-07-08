@while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')
    @include('partials.components.breadcrumb')
    @include('volopedia.partials.glossary-nav')
    {{----}}
@endwhile