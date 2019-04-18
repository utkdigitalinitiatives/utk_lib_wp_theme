<div class="page-body--content--inner">
  @if(get_the_title())
    <div class="page-body--content--title">
      <h1>@php echo get_the_title(); @endphp</h1>
    </div>
  @endif
  <div class="page-body--content--body">
    @include('partials.components.onesearch')
    @php the_content() @endphp
  </div>
</div>
