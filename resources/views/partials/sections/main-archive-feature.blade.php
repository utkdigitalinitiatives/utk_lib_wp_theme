@php
    $featured_item = Volumes::getFeaturedFeature();
@endphp
<div id="detach-sticky-top"></div>
@include('volumes.components.feaure-masthead--category')
<div class="container page-body--container">
    <div class="page-body--flex">
        <span class="page-body--tag">
            Features
        </span>
        <aside class="page-body--aside page-body--aside-hidden">
            @include('partials.sidebar')
        </aside>
        <main class="page-body--content page-body--content-full">
            <div class="facetwp-template">
                @if (!have_posts())
                    <div class="alert alert-warning">
                        {{ __('Sorry, no results were found.', 'sage') }}
                    </div>
                @else
                    @while (have_posts()) @php the_post() @endphp
                        @if(get_the_ID() !== $featured_item)
                            @include('volumes.content-feature-teaser')
                        @endif
                    @endwhile
                @endif
            </div>
            <div class="facetwp-pager">
                @php echo facetwp_display('pager') @endphp
            </div>
        </main>
    </div>
    <div id="detach-sticky-bottom"></div>
</div>
