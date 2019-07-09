@extends('layouts.app')

@section('content')
    <div class="utk-volopedia--header" style="background-image: url(<?= \App\asset_path('images/volopedia.jpg') ?>);">
        @include('partials.page-header')
        @include('volopedia.partials.glossary-nav')
    </div>
    <div class="page-body page-body--archive page-body--volopedia">
        @include('volopedia.main-volopedia-item')
    </div>
@endsection