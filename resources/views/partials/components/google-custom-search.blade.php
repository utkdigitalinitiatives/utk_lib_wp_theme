@php
    $allowedSites = [
        91
    ];

@endphp
@if (is_front_page() && in_array(get_current_blog_id(), $allowedSites))
    <div class="utk-gcs-wrap @if(isset($_GET['gcs'])) utk-gcs-active @endif">
        <div class="utk-gcs-results">
            <form class="utk-gcs">
                <div class="utk-gcs--bar">
                    <input name="gcs"
                           type="text"
                           placeholder="Find hours, services, and more..."
                           value='@php print esc_attr(stripcslashes($_GET['gcs'])) @endphp'
                           class="utk-gcs--search" />
                    @if(isset($_GET['gcs']))
                        <input type="submit"
                               value="Submit"
                               class="utk-gcs--submit" />
                    @endif
                </div>
                @if(!isset($_GET['gcs']))
                    <div class="utk-gcs--buttons">
                        <input type="submit"
                               value="Search lib.utk.edu"
                               class="utk-gcs--submit" />
                        <input type="submit"
                               value="Switch to OneSearch"
                               class="utk-gcs--submit" />
                    </div>
                @endif
            </form>
            <gcse:searchresults-only></gcse:searchresults-only>
        </div>
        @if(isset($_GET['gcs']))
        <div class="utk-gcs-aside">
            @php // @todo: build side promotions @endphp
        </div>
        @endif
    </div>
@endif
