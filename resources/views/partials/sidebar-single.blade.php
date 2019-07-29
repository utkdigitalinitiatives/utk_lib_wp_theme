<div class="aside-subsite-single">
    @include('partials.components.single-related')
    <a href="@php echo get_home_url() @endphp" class="btn btn-secondary">View More</a>
</div>
<div class="aside-subsite-custom-widgets">
  @php
    dynamic_sidebar('sidebar-primary')
  @endphp
</div>
