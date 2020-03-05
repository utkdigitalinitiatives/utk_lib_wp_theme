@if( ! empty( $image )
    && function_exists( 'get_rocket_option' )
    && get_rocket_option( 'lazyload' )
    && ! ( defined( 'DONOTROCKETOPTIMIZE' ) && DONOTROCKETOPTIMIZE )
)
    <div class="utk-lazyload">
        <img class="utk-lazyload--render"
             style="width: 100%; height: auto;"
             src="{{$image['sizes'][$render_size]}}"
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
