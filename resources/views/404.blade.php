@extends('layouts.app')

@section('content')
  @include('partials.page-header')
  @if (!have_posts())
    <div class="container">
      <div class="utk-404">
        <div class="utk-404--message">
          <span class="utk-heading-1 sr-only" role="heading" aria-level="1">404 Error</span>
          <h3>Page Not Found</h3>
          <p>We are sorry, but the page you were trying to view does not exist.</p>
        </div>
        <div class="utk-404--panel">
          <div id="utk-panel-mini" data-subjects="[{}]"></div>
        </div>
      </div>
    </div>
  @endif
@endsection
