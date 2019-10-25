<div class="utk-formal--header--background">
    <div class="utk-volume--title">
        <div class="container">
            <span class="utk-volume--title--series">Boundless Series {{$featured_id}}</span>
            <h1>@php echo get_the_title($featured_item) @endphp</h1>
            <span class="utk-volume--title--intro">Donec venenatis risus at ligula vestibulum malesuada. Mauris vitae orci. </span>
        </div>
    </div>
    @php
        print get_the_post_thumbnail($featured_item, 'hero_image');
    @endphp
</div>