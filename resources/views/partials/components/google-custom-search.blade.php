@php
    $allowedSites = [
        91
    ];
@endphp
@if (is_front_page() && in_array(get_current_blog_id(), $allowedSites))
    <form class="utk-gcs">
        <div class="utk-gcs--bar">
        <input name="gcs"
               type="text"
               placeholder="Find Services, News, and More"
               value="@php echo $_GET['q'] @endphp"
               class="utk-gcs--search" />
        <input type="submit"
               value="Go"
               class="utk-gcs--submit" />
        </div>
        <div class="utk-gcs--buttons">
            <input type="submit"
                   value="Search lib.utk.edu"
                   class="utk-gcs--submit" />
            <input type="submit"
                   value="Switch to OneSearch"
                   class="utk-gcs--submit" />
        </div>
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