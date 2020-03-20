@php
  /**
   * Template Name: Clean
   * Description: Page contains large image just below header and above content & sidebar.
   *
   * @package Sage
   * @subpackage UT Libraries
   */
@endphp

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
  @include('partials.page-header-truncate')
  <div class="page-body page-body-truncate page-body-nosidebar">
    @include('partials.sections.main-clean')
  </div>
  @endwhile
@endsection
