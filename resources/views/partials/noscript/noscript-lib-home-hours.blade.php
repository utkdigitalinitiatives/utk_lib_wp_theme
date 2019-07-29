@php

namespace UTKLibrary\Library\App\Extras;

@endphp
<div class="utk-hours">
    <div class="utk-hours-header"><h3>Libraries &amp; Locations</h3></div>
    <div class="utk-hours--listing">
        <ul class="utk-hours--listing--col"
            aria-label="hodges library and locations inside">
            <li class="utk-hours--listing--item "><a href="https://lib.utk.edu">
                    <figure><img
                                src="/wp-content/themes/utk_lib_wp_theme/resources/assets/react/header/05f11cf6906e716ce2f823daeec0db30.jpg"
                                alt="John C. Hodges Library"></figure>
                    <div class="utk-hours--listing--item--meta"><span
                                class="library-title">Hodges</span><span
                                class="library-subtitle">Main Library</span><span
                                class="utk-hours--listing--item--hours">@php(LibCal::the_hours_by_lid(52))</span>
                    </div>
                </a>
                <ul class="utk-hours--listing--item--childmenu"
                    aria-label="locations within Hodges">
                    <li class="utk-hours--listing--item utk-hours--listing--item--child">
                        <a href="https://commons.utk.edu/">
                            <div class="utk-hours--listing--item--meta"><span
                                        class="library-title">The Commons</span><span
                                        class="library-subtitle">Hodges 2nd Floor</span><span
                                        class="utk-hours--listing--item--hours">@php(LibCal::the_hours_by_lid(52))</span>
                            </div>
                        </a></li>
                    <li class="utk-hours--listing--item utk-hours--listing--item--child">
                        <a href="https://www.lib.utk.edu/studio">
                            <div class="utk-hours--listing--item--meta"><span
                                        class="library-title">The Studio</span><span
                                        class="library-subtitle">Hodges 235</span><span
                                        class="utk-hours--listing--item--hours">@php(LibCal::the_hours_by_lid(217))</span>
                            </div>
                        </a></li>
                    <li class="utk-hours--listing--item utk-hours--listing--item--child">
                        <a href="https://www.lib.utk.edu/special">
                            <div class="utk-hours--listing--item--meta"><span
                                        class="library-title">Special Collections</span><span
                                        class="library-subtitle">Hodges 121</span><span
                                        class="utk-hours--listing--item--hours">@php(LibCal::the_hours_by_lid(224))</span>
                            </div>
                        </a></li>
                </ul>
                <a class="utk-hours--listing--item--more"><span
                            class="icon-plus">3</span> Show More at Hodges</a></li>
        </ul>
        <ul class="utk-hours--listing--col" aria-label="other libraries on campus">
            <li class="utk-hours--listing--item "><a href="https://lib.utk.edu/agvet">
                    <figure><img
                                src="/wp-content/themes/utk_lib_wp_theme/resources/assets/react/header/0cbe268ec955cd0bcc2ee7d30fb21b7f.jpg"
                                alt="Pendergrass Agriculture &amp; Veterinary Medicine Library">
                    </figure>
                    <div class="utk-hours--listing--item--meta"><span
                                class="library-title">Pendergrass</span><span
                                class="library-subtitle">AgVet Library</span><span
                                class="utk-hours--listing--item--hours">@php(LibCal::the_hours_by_lid(225))</span>
                    </div>
                </a></li>
            <li class="utk-hours--listing--item "><a href="https://lib.utk.edu/music">
                    <figure><img
                                src="/wp-content/themes/utk_lib_wp_theme/resources/assets/react/header/d9763b4914218a8fb970d6545997d543.jpg"
                                alt="George F. DeVine Music Library"></figure>
                    <div class="utk-hours--listing--item--meta"><span
                                class="library-title">DeVine</span><span
                                class="library-subtitle">Music Library</span><span
                                class="utk-hours--listing--item--hours">@php(LibCal::the_hours_by_lid(226))</span>
                    </div>
                </a></li>
            <li class="utk-hours--listing--item "><a
                        href="https://lib.utk.edu/request/storage">
                    <figure><img
                                src="/wp-content/themes/utk_lib_wp_theme/resources/assets/react/header/dff1a40b70fc66eaf0abdf8f6ce372d2.jpg"
                                alt="James D. Hoskins Library"></figure>
                    <div class="utk-hours--listing--item--meta"><span
                                class="library-title">Hoskins</span><span
                                class="library-subtitle">Storage &amp; Reading Room</span><span
                                class="utk-hours--listing--item--hours">@php(LibCal::the_hours_by_lid(227))</span>
                    </div>
                </a></li>
        </ul>
    </div>
</div>