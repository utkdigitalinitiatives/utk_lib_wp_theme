@extends('layouts.app')

@section('content')
    @include('partials.page-header')
    <div class="page-body page-body-nosidebar page-body--archive">
        @include('partials.sections.main-formal-archive')
    </div>
@endsection