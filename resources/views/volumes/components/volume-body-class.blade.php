@php
    if (UT_LIBRARIES_ENTITY === 'volumes') :
        if(get_post_type() === 'volume' && !is_tax()) :
            $color = 'utk-color-' . get_field('volume_color');
        elseif (get_post_type() === 'volume' && is_tax('volume_category')) :
            $featured_item = get_option('options_featured_item_boundless', null);
            $color = 'utk-color-' . get_field('volume_color', $featured_item);
        else :
            //
        endif;
    endif;
@endphp