@php

  if (function_exists('get_blog_details')) {

    $subsite = get_blog_details();

  } else {

    $subsite = null;

  }

@endphp
<div class="page-header page-header-truncate page-header-volumes">
  @include('partials.global-page-header-float')
</div>
