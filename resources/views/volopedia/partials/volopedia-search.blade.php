@php
    $value = '';
    if (isset($_GET['fwp_volopedia_search'])) :
        $value = $_GET['fwp_volopedia_search'];
    endif;
@endphp
<form class="utk-volopedia--search--form" action="/entries/">
    <input class="utk-volopedia--search--form--value"
           value="{{$value}}"
           placeholder="Search Volopedia by keyword, ex: 'smokey'"
           name="fwp_volopedia_search"/>
    <input class="utk-volopedia--search--form--submit" value="Search Volopedia" type="submit"/>
</form>
<div class="utk-volopedia--search--form--facetwp">
@php echo facetwp_display('facet', 'volopedia_search'); @endphp
</div>