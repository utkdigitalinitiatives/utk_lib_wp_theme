@php

    use App\Preprocess_Subsite;

    $subsite_details = get_blog_details(get_current_blog_id());
    $subsite_path = $subsite_details->path;
    $subsite_menu_slug = 'subsite'; /* this must remain static */
    $post_id = get_the_ID();
    $is_front = is_front_page();

    $initial_menu_trail = Preprocess_Subsite::prepare_subsite_menu($post_id, $subsite_menu_slug);
    $initial_depth = count($initial_menu_trail) - 1;
    $initial_menu_id = $initial_menu_trail[$initial_depth]['menu_id'];

    /*
    if (!$is_front) :
      $initial_menu_trail = Preprocess_Subsite::prepare_subsite_menu($post_id, $subsite_menu_slug);
      $initial_depth = count($initial_menu_trail) - 1;
      $initial_menu_id = $initial_menu_trail[$initial_depth]['menu_id'];
    else :
      $initial_menu_trail = [];
      $initial_depth = 0;
      $initial_menu_id = 0;
    endif;
    */

    $defaults = [
     'menu'     => $subsite_menu_slug
    ];

@endphp

<div id="utk-subsite-menu"
     data-url="@php echo network_site_url(); @endphp"
     data-subsite-slug="@php echo $subsite_path; @endphp"
     data-menu-slug="@php echo $subsite_menu_slug; @endphp"
     @if($post_id)
     data-initial-post="@php echo $post_id; @endphp"
     @endif
     data-initial-menu-id="@php echo $initial_menu_id; @endphp"
     data-initial-depth="@php echo $initial_depth; @endphp"
     data-initial-trail='{!!  json_encode($initial_menu_trail); !!}'
>
</div>
<noscript>
    @php wp_nav_menu($defaults); @endphp
</noscript>
