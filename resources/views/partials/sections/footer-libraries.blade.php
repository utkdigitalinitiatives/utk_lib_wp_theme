@php

// $ut_libraries_horizontal = \App\asset_path('images/ut-libraries-horizontal.svg');

@endphp
<div class="container">
  <div class="footer-libraries--inner">
    <div class="footer-libraries--anchor">
      <div class="footer-libraries--identity">
        <div class="footer-libraries--identity--brand">
          <a href="/" class="footer-libraries--identity--brand--unit">University Libraries</a>
        </div>
        <p>
          1015 Volunteer Boulevard<br/>
          Knoxville, TN 37996<br/>
          <a href="tel:865-974-1000" title="Call The University of Tennessee - 865-974-1000">865-974-1000</a>
        </p>
        <div class="footer-libraries--menu-extras">
          @include('partials.components.footer-libraries-menu-extras')
        </div>
      </div>
    </div>
    <div class="footer-libraries--menu">
      @include('partials.components.footer-libraries-menu-drawer')
    </div>
  </div>
</div>
