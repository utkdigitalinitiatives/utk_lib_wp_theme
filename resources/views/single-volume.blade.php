@php
    /**
    * Template Name: Formal
    * Description: Page with formal heading for sites or content without need for sidebar.
    *
    * @package Sage
    * @subpackage UT Libraries
    */

    Namespace App\Controllers;

@endphp

@extends('layouts.app')

@section('content')
    @while(have_posts()) @php the_post() @endphp
        @include('partials.page-header-volumes')
        <div class="page-body page-body-truncate">
            @include('volumes.main-volume')
        </div>
    @endwhile
@endsection
