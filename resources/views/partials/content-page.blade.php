<div class="page-body--content--inner">
  <div class="page-body--content--title">
    <h1>@php echo get_the_title(); @endphp</h1>
  </div>
  <div class="page-body--content--body">
    @if (get_the_content())

      @php the_content() @endphp

    @else

      @include('partials.components.placeholder')

    @endif
  </div>
</div>
