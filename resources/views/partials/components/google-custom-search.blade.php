@php
    $allowedSites = [
        91
    ];
@endphp
@if (is_front_page() && in_array(get_current_blog_id(), $allowedSites))
    <form class="utk-gcs @if(isset($_GET['gcs'])) utk-gcs-active @endif">
        <div class="utk-gcs--bar">
            <input name="gcs"
                   type="text"
                   placeholder="Find Services, News, and More"
                   value="@php echo $_GET['gcs'] @endphp"
                   class="utk-gcs--search" />
            @if(isset($_GET['gcs']))
                <input type="submit"
                       value="Search lib.utk.edu"
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
    <script>
        (function() {
            var cx = '013341540797571815700:khrwxbzdaoi';
            var gcse = document.createElement('script');
            gcse.type = 'text/javascript';
            gcse.async = true;
            gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(gcse, s);
        })();
    </script>
    <gcse:searchresults-only></gcse:searchresults-only>
@endif
