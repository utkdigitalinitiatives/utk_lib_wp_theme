@php
    $allowedSites = [
        91
    ];
@endphp
@if (is_front_page() && in_array(get_current_blog_id(), $allowedSites))
    <form>
        <input name="q" value="" />
        <input type="submit" value="Search lib.utk.edu" />
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