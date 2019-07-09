@if(isset($_GET['fwp_volopedia_glossary']))
    <div class="utk-volopedia--archive-meta">
        <h1 class="utk-volopedia--archive-meta--title">@php print strtoupper($_GET['fwp_volopedia_glossary']); @endphp</h1>
        @if(isset($_GET['fwp_filter_current_volume']))
            <span class="utk-volopedia--archive-meta--filter">&ldquo;@php print $_GET['fwp_filter_current_volume']; @endphp&rdquo;</span>
        @endif
        <span class="utk-volopedia--archive-meta--count">@php print $GLOBALS['wp_query']->found_posts; @endphp Entries</span>
    </div>
@else
    <div class="utk-volopedia--archive-meta">
        @if(isset($_GET['fwp_filter_current_volume']))
            <span class="utk-volopedia--archive-meta--filter">&ldquo;@php print $_GET['fwp_filter_current_volume']; @endphp&rdquo;</span>
        @endif
        <span class="utk-volopedia--archive-meta--count">@php print $GLOBALS['wp_query']->found_posts; @endphp Entries</span>
    </div>
@endif