<article @php post_class() @endphp>
  <header>
    <h2 class="entry-title"><a href="@php echo get_permalink() @endphp">@php echo get_the_title() @endphp</a></h2>
  </header>
  <div class="entry-summary">
    @php the_excerpt() @endphp
  </div>
</article>
