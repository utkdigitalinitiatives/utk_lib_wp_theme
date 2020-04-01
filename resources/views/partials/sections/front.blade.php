<div class="utk-home-body sr-only">
  <div class="container">
    <?php echo get_the_content(); ?>
  </div>
</div>
<div id="utk-lib-home-hours">
    <noscript>
        @include('partials.noscript.noscript-lib-home-hours')
    </noscript>
</div>
<div id="utk-panel">
    <noscript>
        @include('partials.noscript.noscript-lib-home-panel')
    </noscript>
</div>
<section class="utk-home" id="utk-lib-home">
    <noscript>
        @include('partials.noscript.noscript-lib-home')
    </noscript>
</section>
@include('partials.components.new-featured')
