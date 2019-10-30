@extends('layouts.app')

@php
  $postStyle = get_site_option('options_site_post_style');
  $postStyleClass = sanitize_html_class(strtolower($postStyle));
@endphp

@section('content')
  @if($postStyleClass === 'blog')
    @include('partials.page-header-volumes')
    <div class="page-body page-body-blog page-body-post page-body-truncate">
      @include('partials.sections.main-archive-volumes')
    </div>
  @else
    @include('partials.page-header')
    <div class="page-body">
      @include('partials.sections.main-archive')
    </div>
  @endif
@endsection