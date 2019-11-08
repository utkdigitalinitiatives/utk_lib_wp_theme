@php
    $id = get_queried_object()->term_id;
    $term = get_term($id);
@endphp
<div id="detach-sticky-top"></div>
@include('volumes.components.volume-masthead--category')
<div class="container page-body--container">
    <div class="page-body--flex page-body--flex-volumes">
        <aside class="page-body--aside">
            @if (!have_posts())
                <div class="alert alert-warning">
                    {{ __('Sorry, no results were found.', 'sage') }}
                </div>
            @else
                @while (have_posts()) @php the_post() @endphp
                    @include('volumes.content-volume-teaser')
                @endwhile
            @endif
            {{--@include('partials.sidebar')--}}
        </aside>
        <main class="page-body--content page-body--content-volumes">
            @php print term_description() ; @endphp
            @php echo App::renderEndDots() @endphp
        </main>
    </div>
    <div id="detach-sticky-bottom"></div>
</div>
