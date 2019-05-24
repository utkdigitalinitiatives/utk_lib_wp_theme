@php
    $allowedSites = [
        91
    ];
@endphp
@if (is_front_page() && in_array(get_current_blog_id(), $allowedSites))
    <form class="utk-gcs">
        <input name="q"
               type="text"
               placeholder="Find Services, News, and More"
               value="@php echo $_GET['q'] @endphp"
               class="utk-gcs--search" />
        <input type="submit"
               value="Search lib.utk.edu"
               class="utk-gcs--submit" />
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