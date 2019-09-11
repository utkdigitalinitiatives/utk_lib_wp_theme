@extends('layouts.app')

@section('content')
    @include('partials.page-header-truncate')
    <div class="page-body page-body-truncate page-body-nosidebar page-body--archive">
        @include('partials.sections.main-formal-archive')
    </div>
@endsection