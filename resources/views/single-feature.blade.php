@php
    /**
    * @package Sage
    * @subpackage UT Libraries
    */

    Namespace App\Controllers;

@endphp

@extends('layouts.app')

@section('content')
    @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header-volumes')
    <div class="page-body page-body-blog page-body-truncate">
        @include('partials.sections.main-blog')
    </div>
    @endwhile
@endsection
