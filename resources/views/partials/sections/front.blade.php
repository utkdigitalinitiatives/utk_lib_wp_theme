{{--<link--}}
{{--rel="stylesheet"--}}
{{--href="//cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css"--}}
{{--/>--}}
<div id="utk-panel"></div>
<section class="utk-home-subhead" id="utk-home-subhead">
    <div class="utk-home-subhead--container container">
        <div class="utk-home-subhead--nav-list">
            <h2>Library Services</h2>
            <ul>
                <li><span class="icon-right-big"></span></li>
                <li><a href="#">Hours</a></li>
                <li><a href="#">Reserve a Room</a></li>
                <li><a href="#">Request Items</a></li>
                <li><a href="#">Talk with a Librarian</a></li>
                <li><a href="#">A-Z</a></li>
            </ul>
        </div>
        <div class="page-header--options">
            {{--@include('partials.components.help')--}}
            {{--@include('partials.components.give')--}}
            @include('partials.components.chat')
        </div>
    </div>
</section>
<section class="utk-home" id="utk-home">
    <div class="utk-home--container container">
        <main class="utk-home--main utk-grid">
            <div class="utk-grid--row">
                <div class="utk-grid--row--item">
                    <div class="utk-home--nav-list">
                        <h2>Find Materials</h2>
                        <ul>
                            <li><a href="#">Articles &amp; Databases</a></li>
                            <li><a href="#">One Search</a></li>
                            <li><a href="#">E-Journals</a></li>
                            <li><a href="#">Course Reserves</a></li>
                            <li><a href="#">Digital Collections</a></li>
                            <li><a href="#">Special Collections</a></li>
                            <li><a href="#">UT Dissertations</a></li>
                        </ul>
                    </div>
                </div>
                <div class="utk-grid--row--item">
                    <div class="utk-home--nav-list">
                        <h2>Research Support</h2>
                        <ul>
                            <li><a href="#">Subject Librarians</a></li>
                            <li><a href="#">Research Consultation</a></li>
                            <li><a href="#">Research Guides</a></li>
                            <li><a href="#">Scholars Collaborative</a></li>
                            <li><a href="#">Citing Sources</a></li>
                            <li><a href="#">EndNote / Zotero</a></li>
                        </ul>
                    </div>
                </div>
                <div class="utk-grid--row--item">
                    <div class="utk-home--nav-list">
                        <h2>Resources For</h2>
                        <ul>
                            <li><a href="#">Undergraduates</a></li>
                            <li><a href="#">Graduate Students</a></li>
                            <li><a href="#">Distance Students</a></li>
                            <li><a href="#">Faculty &amp; Instructors</a></li>
                            <li><a href="#">Patrons with Disabilities</a></li>
                            <li><a href="#">Community</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="utk-grid--row">
                <div class="utk-grid--row--item">
                    <div class="utk-home--nav-list utk-home--nav-list-muted utk-home--nav-list-solid">
                        <h2>Get Help</h2>
                        <ul>
                            <li><a href="#">AskUsNow</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Tutorials</a></li>
                            <li><a href="#">Request Instruction</a></li>
                            <li><a href="#">Technology Support</a></li>
                        </ul>
                    </div>
                </div>
                <div class="utk-grid--row--item utk-grid--row--item-double">
                    <div class="utk-home--nav-services">
                        <div class="utk-home--nav-services--item">
                            <a class="utk-home--nav-services--item--link" href="#">IILiad</a>
                            <span class="utk-home--nav-services--item--desc">Interlibrary services for requesting items from external institutions.</span>
                        </div>
                        <div class="utk-home--nav-services--item">
                            <a class="utk-home--nav-services--item--link" href="#">Library Express</a>
                            <span class="utk-home--nav-services--item--desc">UT Libraries books delivered to you on-campus.</span>
                        </div>
                        <div class="utk-home--nav-services--item">
                            <a class="utk-home--nav-services--item--link" href="#">Speciality Printing</a>
                            <span class="utk-home--nav-services--item--desc">Large format and 3D printing services.</span>
                        </div>
                        <div class="utk-home--nav-services--item">
                            <a class="utk-home--nav-services--item--link" href="#">Disability Services</a>
                            <span class="utk-home--nav-services--item--desc">Assistance for access, research, and technology. </span>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <aside>
            <div class="utk-hours">
                <div class="utk-hours-header">
                    <h3>Libraries &amp; Locations</h3>
                </div>
                <ul class="utk-hours--listing">
                    <div class="utk-hours--listing--col">
                        <li class="utk-hours--listing--item"><a href="https://lib.utk.edu" class="library-open">
                                <figure><img
                                            src="/wp-content/themes/utk_lib_wp_theme/resources/assets/react/header/05f11cf6906e716ce2f823daeec0db30.jpg"
                                            alt="John C. Hodges Library"></figure>
                                <div class="utk-hours--listing--item--meta"><span
                                            class="library-title">Hodges</span><span class="library-subtitle">Main Library</span><span
                                            class="utk-hours--listing--item--hours">7:30am - 12am</span></div>
                            </a>
                        <li class="utk-hours--listing--item utk-hours--listing--item--child"><a
                                    href="https://commons.utk.edu/" class="library-open">
                                <div class="utk-hours--listing--item--meta"><span
                                            class="library-title">The Commons</span><span
                                            class="utk-hours--listing--item--hours">7:30am - 12am</span></div>
                            </a></li>
                        <li class="utk-hours--listing--item utk-hours--listing--item--child"><a
                                    href="https://www.lib.utk.edu/studio" class="library-open">
                                <div class="utk-hours--listing--item--meta"><span
                                            class="library-title">The Studio</span><span
                                            class="utk-hours--listing--item--hours">8am - 10pm</span></div>
                            </a></li>
                        <li class="utk-hours--listing--item utk-hours--listing--item--child"><a
                                    href="https://www.lib.utk.edu/special" class="library-open">
                                <div class="utk-hours--listing--item--meta"><span class="library-title">Special Collections</span><span
                                            class="utk-hours--listing--item--hours">9am - 5:30pm</span></div>
                            </a></li>
                        </li></div>
                    <div class="utk-hours--listing-col">
                        <li class="utk-hours--listing--item"><a href="https://lib.utk.edu/agvet" class="library-open">
                                <figure><img
                                            src="/wp-content/themes/utk_lib_wp_theme/resources/assets/react/header/0cbe268ec955cd0bcc2ee7d30fb21b7f.jpg"
                                            alt="Pendergrass Agriculture &amp; Veterinary Medicine Library"></figure>
                                <div class="utk-hours--listing--item--meta"><span
                                            class="library-title">Pendergrass</span><span class="library-subtitle">AgVet Library</span><span
                                            class="utk-hours--listing--item--hours">8am - 6pm</span></div>
                            </a></li>
                        <li class="utk-hours--listing--item"><a href="https://lib.utk.edu/music" class="library-open">
                                <figure><img
                                            src="/wp-content/themes/utk_lib_wp_theme/resources/assets/react/header/d9763b4914218a8fb970d6545997d543.jpg"
                                            alt="George F. DeVine Music Library"></figure>
                                <div class="utk-hours--listing--item--meta"><span
                                            class="library-title">DeVine</span><span class="library-subtitle">Music Library</span><span
                                            class="utk-hours--listing--item--hours">8am - 7pm</span></div>
                            </a></li>
                        <li class="utk-hours--listing--item"><a href="https://lib.utk.edu/request/storage"
                                                                class="library-open">
                                <figure><img
                                            src="/wp-content/themes/utk_lib_wp_theme/resources/assets/react/header/dff1a40b70fc66eaf0abdf8f6ce372d2.jpg"
                                            alt="James D. Hoskins Library"></figure>
                                <div class="utk-hours--listing--item--meta"><span
                                            class="library-title">Hoskins</span><span class="library-subtitle">Storage &amp; Reading Room</span><span
                                            class="utk-hours--listing--item--hours">8am - 4pm</span></div>
                            </a></li>
                    </div>
                </ul>
            </div>
            <div class="utk-home--nav-list utk-home--nav-list-muted utk-home--nav-list-columns">
                <h2>About University Libraries</h2>
                <ul>
                    <li><a href="#">News &amp; Events</a></li>
                    <li><a href="#">Administration</a></li>
                    <li><a href="#">Maps &amp; Directions</a></li>
                    <li><a href="#">Assessment</a></li>
                    <li><a href="#">Employment</a></li>
                    <li><a href="#">The Library Society</a></li>
                    <li><a href="#">Directory</a></li>
                    <li><a href="#">Give to UT Libraries</a></li>
                </ul>
            </div>
        </aside>
    </div>
</section>
<section class="utk-section section-callout section-callout--image-text">
    <div class="container">
        <div class="utk-callout">
            <div class="utk-callout--inner utk-callout--style-default utk-callout--orientation-right">
                <div class="utk-callout--content"><h3>Leisure Reading</h3>
                    <div class="utk-callout--content--paragraphs"><p>Catch up on your summer reading by checking out our
                            leisure reading collection.</p></div>
                    <div class="utk-button-page"><a class="btn btn-default"
                                                    href="https://www-staging.lib.utk.edu/agvet/leisure-reading/"> Visit
                            our page </a></div>
                </div>
                <div class="utk-callout--image">
                    <div class="utk-lazyload"><img class="utk-lazyload--render lazyloaded"
                                                   style="width: 100%; height: auto;"
                                                   src="https://www-staging.lib.utk.edu/wp-content/blogs.dir/24/files/IMG_3814-843x521.jpg"
                                                   alt=""
                                                   data-lazy-srcset="https://www-staging.lib.utk.edu/wp-content/blogs.dir/24/files/IMG_3814-300x200.jpg 300w, https://www-staging.lib.utk.edu/wp-content/blogs.dir/24/files/IMG_3814-768x512.jpg 768w, https://www-staging.lib.utk.edu/wp-content/blogs.dir/24/files/IMG_3814-1024x683.jpg 1024w, https://www-staging.lib.utk.edu/wp-content/blogs.dir/24/files/IMG_3814-1265x843.jpg 1265w, https://www-staging.lib.utk.edu/wp-content/blogs.dir/24/files/IMG_3814-299x199.jpg 299w, https://www-staging.lib.utk.edu/wp-content/blogs.dir/24/files/IMG_3814-29x18.jpg 29w"
                                                   data-lazy-src="https://www-staging.lib.utk.edu/wp-content/blogs.dir/24/files/IMG_3814-843x521.jpg"
                                                   srcset="https://www-staging.lib.utk.edu/wp-content/blogs.dir/24/files/IMG_3814-300x200.jpg 300w, https://www-staging.lib.utk.edu/wp-content/blogs.dir/24/files/IMG_3814-768x512.jpg 768w, https://www-staging.lib.utk.edu/wp-content/blogs.dir/24/files/IMG_3814-1024x683.jpg 1024w, https://www-staging.lib.utk.edu/wp-content/blogs.dir/24/files/IMG_3814-1265x843.jpg 1265w, https://www-staging.lib.utk.edu/wp-content/blogs.dir/24/files/IMG_3814-299x199.jpg 299w, https://www-staging.lib.utk.edu/wp-content/blogs.dir/24/files/IMG_3814-29x18.jpg 29w"
                                                   data-was-processed="true">
                        <div data-bg="url(https://www-staging.lib.utk.edu/wp-content/blogs.dir/24/files/IMG_3814-29x18.jpg)"
                             class="utk-lazyload--preload rocket-lazyload"
                             style="background-image: url(&quot;https://www-staging.lib.utk.edu/wp-content/blogs.dir/24/files/IMG_3814-29x18.jpg&quot;);"
                             data-was-processed="true"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>