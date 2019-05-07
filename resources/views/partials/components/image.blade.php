@if( ! empty( $image )
    && function_exists( 'get_rocket_option' )
    && get_rocket_option( 'lazyload' )
    && ! ( defined( 'DONOTROCKETOPTIMIZE' ) && DONOTROCKETOPTIMIZE )
)
    <div class="utk-lazyload">
        <img class="utk-lazyload--render"
             style="width: 100%; height: auto;"
             src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%201%201'%3E%3C/svg%3E"
             alt="{{$image['alt']}}"
             data-lazy-srcset="{{$srcset}}"
             data-lazy-src="{{$image['sizes'][$render_size]}}"
        />
        <div class="utk-lazyload--preload"
             style="background-image: url('{{$image['sizes'][$preload_size]}}');"></div>
    </div>
@elseif( ! empty( $image ) )
    <img src="{{$image['url']}}"
         alt="{{$image['alt']}}"
         srcset="{{$srcset}}"
    />
@endif