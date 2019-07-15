<div class="aside-subsite-single">
    @include('partials.components.single-related')
    <a href="/news" class="btn btn-secondary">View All</a>
</div>
<div class="aside-subsite-custom-widgets">
  @php
    dynamic_sidebar('sidebar-primary')
  @endphp
</div>
