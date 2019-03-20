@php
  $callout = UTKLibrary\Library\Models\Callout::render_callout();
@endphp

@if($callout)
  @php
    $type = $callout['fields']['callout_type'];
  @endphp
  <section class="utk-section section-vibrant-content section-vibrant-content--{{$type}}">
    @if ($type == 'background_video')
      <div class="section--content">
        <div class="container">
          <div class="section--content--inner">
            <h3>Example Headline for Callout@php // echo $callout['fields']['callout_headline']; @endphp</h3>
            <p>Proin non erat laoreet, viverra orci malesuada, sagittis felis. Morbi suscipit velit lorem, vitae eleifend turpis placerat et. Quisque sed ipsum maximus est luctus id.</p>
            <a href="#" class="btn btn-md btn-primary btn-inverse btn-with-icon">Primary Action <span class="icon-right-open"></span></a>
            <a href="#" class="btn btn-md btn-secondary btn-inverse btn-outline">Secondary Action</a>
          </div>
        </div>
      </div>
      <div class="section--background-video">
        <iframe
          src="@php echo $callout['fields']['callout_youtube_url']; @endphp?controls=0&showinfo=0&rel=0&autoplay=1&loop=1&playlist=@php echo str_replace('https://www.youtube.com/embed/','',$callout['fields']['callout_youtube_url']); @endphp"
          frameborder="0"
          allowfullscreen
        >
        </iframe>
      </div>
    @endif
  </section>
@endif
