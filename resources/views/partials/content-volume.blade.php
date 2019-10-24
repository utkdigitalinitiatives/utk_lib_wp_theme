@if(get_field('page_hide_title'))
    <div class="page-body--content--inner page-body--hide-title">
@else
    <div class="page-body--content--inner">
@endif

    @if(get_the_title())
        <div class="page-body--content--title">
            <span class="utk-heading-1" role="heading" aria-level="1">@php echo get_the_title(); @endphp</span>
        </div>
    @endif
    <div class="page-body--content--body">
        @php the_content() @endphp
    </div>
</div>
