@extends('layouts.app')

@php
    $postStyle = get_site_option('options_site_post_style');
    $postStyleClass = sanitize_html_class(strtolower($postStyle));
@endphp

@section('content')
    @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')
        <div class="page-body @if($postStyleClass)page-body-{{$postStyleClass}}@endif">

            @if('Blog' == $postStyle)
                @include('partials.sections.main-full-width')

            @elseif('Standard' === $postStyle)
                @include('partials.sections.main')

            @else
                @include('partials.sections.main')

            @endif

        </div>
    @endwhile
@endsection
