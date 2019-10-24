@extends('layouts.app')

@section('content')
  @include('partials.page-header-truncate')
  <div class="page-body page-body--archive">
    @include('partials.sections.main-volume-category')
  </div>
@endsection