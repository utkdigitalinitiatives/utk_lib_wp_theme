@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
  @if(UT_LIBRARIES_ENTITY === 'volopedia')
    <div class="utk-volopedia--header" style="background-image: url(<?= \App\asset_path('images/volopedia.jpg') ?>);">
      @include('partials.page-header')
      @include('volopedia.partials.glossary-nav')
    </div>
    <div class="page-body">
      @include('volopedia.partials.main')
    </div>
  @else
    @include('partials.page-header')
    <div class="page-body">
      @include('partials.sections.main')
    </div>
  @endif
  @endwhile
@endsection
