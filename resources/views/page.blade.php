@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
  @if(defined('PANTHEON_SITE_NAME'))
    @if(PANTHEON_SITE_NAME === 'utk-volopedia')
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
  @endif
  @endwhile
@endsection
