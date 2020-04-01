@php
  $curated = get_field('resource_curate', 'option');
@endphp
@if(is_array($curated))
  @php
    //
  @endphp
  <section>
    <div class="container">
      <h3>@php echo get_field('resource_title', 'option') @endphp</h3>
    </div>
  </section>
@endif
