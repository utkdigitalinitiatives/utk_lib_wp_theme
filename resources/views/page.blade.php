@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
  @include('partials.page-header')
  <div class="page-body">
    @include('partials.sections.main')
  </div>
  @endwhile
@endsection
