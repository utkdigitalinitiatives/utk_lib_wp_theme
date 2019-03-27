@php

    use App\PreprocessSubsite;

    $locations = get_nav_menu_locations();
    $subsite_menu = wp_get_nav_menu_object($locations['sidebar_subsite']);

    if (function_exists('get_blog_details')) {

        $subsite_details = get_blog_details(get_current_blog_id());
        $subsite_path = $subsite_details->path;

    } else {

        $subsite_path = null;

    }

    $post_id = get_the_ID();
    $is_front = is_front_page();

    if ($subsite_menu) :
        $initial_menu_trail = PreprocessSubsite::prepareSubsiteMenu($post_id, $subsite_menu->term_id);
        $initial_depth = count($initial_menu_trail) - 1;
        $initial_menu_id = $initial_menu_trail[$initial_depth]['menu_id'];

    else :
        $initial_menu_trail = '{}';
        $initial_depth = 0;
        $initial_menu_id = 0;

    endif;

    $defaults = [
     'menu'     => $subsite_menu_slug
    ];

@endphp

<div id="utk-subsite-menu"
     data-url="@php echo network_site_url(); @endphp"
     data-subsite-slug="@php echo $subsite_path; @endphp"
     data-menu-api-slug="subsite"
     @if($post_id)
     data-initial-post="@php echo $post_id; @endphp"
     @endif
     data-initial-menu-id="@php echo $initial_menu_id; @endphp"
     data-initial-depth="@php echo $initial_depth; @endphp"
     data-initial-trail='@php echo json_encode($initial_menu_trail) @endphp'
>
</div>

<noscript>
    @php wp_nav_menu($defaults); @endphp
</noscript>
