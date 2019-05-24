@php
/**
* Template Name: Full Width (No Sidebar)
* Description: Page for sites or content without need for sidebar.
*
* @package Sage
* @subpackage UT Libraries
*/
@endphp

@extends('layouts.app')

@section('content')
@while(have_posts()) @php the_post() @endphp
@include('partials.page-header')
<div class="page-body page-body-nosidebar">
    @include('partials.sections.main-nosidebar')
</div>
@endwhile
@endsection
