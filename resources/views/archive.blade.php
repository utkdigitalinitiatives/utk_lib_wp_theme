@extends('layouts.app')

@php
  $postStyle = get_site_option('options_site_post_style');
  $postStyleClass = sanitize_html_class(strtolower($postStyle));
@endphp

@section('content')
  @include('partials.page-header')
  {{--<div class="page-body page-body--archive @if($postStyleClass)page-body--archive-{{$postStyleClass}}@endif">--}}
  <div class="page-body page-body--archive">

    @if('Blog' === $postStyle)
      {{--@include('partials.sections.main-archive-blog')--}}
      @include('partials.sections.main-archive')

    @elseif('Standard' === $postStyle)
      @include('partials.sections.main-archive')

    @else
      @include('partials.sections.main-archive')

    @endif

  </div>
@endsection