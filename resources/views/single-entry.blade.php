@extends('layouts.app')

@section('content')
    @include('partials.page-header')
    <div class="page-body page-body--archive page-body--volopedia">
        @include('volopedia.main-volopedia-item')
    </div>
@endsection