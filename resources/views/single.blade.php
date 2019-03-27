@extends('layouts.app')

@php
    $postStyle = get_site_option('options_site_post_style');
@endphp

@section('content')
    @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')
        <div class="page-body">

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
