@php
  /**
   * Template Name: Hero
   * Description: Page contains large image just below header and above content & sidebar.
   *
   * @package Sage
   * @subpackage UT Libraries
   */
@endphp

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
  @include('partials.page-header-hero')
  <div class="page-body page-body-hero">
    @include('partials.sections.main')
  </div>
  @endwhile
@endsection
