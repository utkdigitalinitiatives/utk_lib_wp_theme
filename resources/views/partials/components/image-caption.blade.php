@if( ! empty( $image ) )
    @if( ! empty( isset($image['caption']) && ! empty( $image['caption'] ) ) )
        <div class="utk-image--caption">
            <span>@php echo $image['caption'] @endphp</span>
            <a href="#">More <span class="icon-right-big"></span></a>
        </div>
    @endif
@endif