@php
    $allowedSites = [
        1,  // main
        24, // agvet
        25  // music
    ];
    $onesearchLogo = \App\asset_path('images/ut-onesearch.svg');
@endphp
@if (is_front_page() && in_array(get_current_blog_id(), $allowedSites))
    <div class="utk-onesearch">
        <div class="utk-onesearch--header">
            <a href="https://www.lib.utk.edu/onesearch" class="utk-onesearch--header--logo">
                <img src="{{$onesearchLogo}}"
                     alt="Click to sign in and access OneSearch"
                />
            </a>
            <div class="utk-onesearch--header--links">
                <div class="utk-onesearch--header--links--item">
                    <a href="https://utk-almaprimo.hosted.exlibrisgroup.com/primo-explore/search?vid=01UTK&mode=advanced" target="_blank">Advanced Search</a>
                </div>
                <div class="utk-onesearch--header--links--item">
                    <a href="https://utk-almaprimo.hosted.exlibrisgroup.com/primo-explore/browse?vid=01UTK" target="_blank">Browse UT Collections</a>
                </div>
            </div>
        </div>
        <div class="utk-onesearch--box">
            <form accept-charset="UTF-8" action="/onesearch.php" method="post">
                <div class="utk-onesearch--box--wrap">
                    <span class="utk-onesearch--box--icon">
                        <span class="icon-search"></span>
                    </span>
                    <input class="form-control utk-onesearch--box--search"
                           title="search"
                           type="text"
                           value=""
                           placeholder="Search for books, articles, media, digital collections, etc..." />
                    <input class="form-control utk-onesearch--box--submit"
                           type="submit"
                           value="Search" />
                </div>
                <div class="utk-onesearch--box--options">
                    Limit search to:
                    <input checked="checked" name="searchtype" type="radio" value="onesearch" hidden="yes" />
                    <span class="utk-onesearch--box--options--item">
                        <input name="searchtype" type="radio" value="utcollections" />
                        UT Collections
                    </span>
                    <span class="utk-onesearch--box--options--item">
                        <input name="searchtype" type="radio" value="coursereserves" />
                        Course Reserves
                    </span>
                </div>
            </form>
        </div>
    </div>
@endif