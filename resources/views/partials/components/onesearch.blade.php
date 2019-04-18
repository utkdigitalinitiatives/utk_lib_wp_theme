@php
    $allowedSites = [
        1,  // main
        24, // agvet
        25  // music
    ];
@endphp
@if (is_front_page() && in_array(get_current_blog_id(), $allowedSites))
    <div class="utk-onesearch">
        <a href="https://www.lib.utk.edu/onesearch"><img src="https://www.lib.utk.edu/template/2016/images-utlibraries/onesearch-215.png" class="onesearch-logo" alt="Click to sign in and access OneSearch" title="Click to sign in and access OneSearch" width="215" height="50" /></a>
        <div class="search-box">
            <div class="search-link-box">
                <div class="search-link">
                    <a href="https://utk-almaprimo.hosted.exlibrisgroup.com/primo-explore/search?vid=01UTK&mode=advanced" target="_blank">Advanced Search</a>
                </div>
                <div class="search-link">
                    <a href="https://utk-almaprimo.hosted.exlibrisgroup.com/primo-explore/browse?vid=01UTK" target="_blank">Browse UT Collections</a></div>
            </div>
            <form accept-charset="UTF-8" action="/onesearch.php" method="post"><input class="form-control searchfield" title="search" name="box" type="text" onfocus="if(this.value == 'Search for books, articles, media, digital collections . . .') { this.value = ''; }" value="Search for books, articles, media, digital collections . . ." width="100%" />

                <div class="search-options">
                    Limit search to: &nbsp; <input checked="checked" name="searchtype" type="radio" value="onesearch" hidden="yes" />
                    <span class="search-option"><input name="searchtype" type="radio" value="utcollections" /> UT Collections</span>
                    <span class="search-option"> <input name="searchtype" type="radio" value="coursereserves" /> Course Reserves</span>
                    <br class="clear" />
                </div>
            </form>
        </div>
    </div>
@endif