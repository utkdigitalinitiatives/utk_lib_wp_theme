@php

  $ut_system = \App\asset_path('images/ut-system.svg');

@endphp
<div class="container">
  <div class="footer-system--inner">
    <a href="http://tennessee.edu" class="footer-system--logo">
      <span class="sr-only">University of Tennessee System</span>
      <img
        src="{{$ut_system}}"
        alt="University of Tennessee System"
      />
    </a>
    <p class="footer-system--text">The flagship campus of <a href="http://tennessee.edu">the University of Tennessee System</a> and partner in <a href="http://www.tntransferpathway.org/">the Tennessee Transfer Pathway</a>.</p>
  </div>
</div>
