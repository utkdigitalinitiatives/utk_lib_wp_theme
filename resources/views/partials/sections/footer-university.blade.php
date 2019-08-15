@php

  $ut_square = \App\asset_path('images/ut-big-orange-big-ideas.svg');



@endphp
<div class="container">
  <div class="footer-university--inner">
    <div class="footer-university--anchor">
      <div class="footer-university--identity">
        <div class="footer-university--identity--brand">
          <a href="https://www.utk.edu" class="footer-university--identity--brand--logo">
            <span class="sr-only">The University of Tennessee</span>
            <img
              src="{{$ut_square}}"
              alt="University of Tennessee"
            />
          </a>
        </div>
        <p>
          <strong class="footer-university--title">The University of Tennessee, Knoxville</strong>
          Knoxville, TN 37996<br/>
          <a href="tel:865-974-1000" title="Call UT Libraries - 865-974-1000">865-974-1000</a>
        </p>
      </div>
    </div>
    <div class="footer-university--more">
      <div class="footer-university--search">
        {{--
        insert form for search here:
        --}}
        <form class="footer-university--search--form" id="utk_seek" name="utk_seek" method="post" accept-charset="iso-8859-1" action="//www.utk.edu/masthead/query.php">
          <div class="form-group">
            <input type="text" name="qt" placeholder="Search utk.edu" onfocus="if(this.value == 'Search utk.edu') { this.value = ''; }" value="Search utk.edu" class="form-control" title="search" speech="" x-webkit-speech="">
          </div>
          <input type="hidden" name="qtype" class="searchtext" value="utk" title="search type">
          <input name="go" type="submit" aria-label="Search utk.edu" title="Submit" class="btn btn-primary" value="Search">
        </form>
        {{--
        end form insert
        --}}
      </div>
      <div class="footer-university--menu">
        @include('partials.components.footer-university-menu')
      </div>
    </div>
  </div>
</div>
