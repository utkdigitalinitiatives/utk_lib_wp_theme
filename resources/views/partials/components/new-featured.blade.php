@php

  namespace UTKLibrary\Library\Models;

@endphp
@if(is_array(get_field('resource_curate', 'option')))
  @php

    // gets resource post_ids curated in dashboard site options
    $curated = get_field('resource_curate', 'option');

    // gets all the post data foreach
    $resources = Resource::build_resources($curated);

    // set thumbnail size
    $size = 'medium';

  @endphp
  <section class="utk-new-featured">
    <div class="container">
      <div class="utk-new-featured--container">
        <header>
          <h3>{{ get_field('resource_title', 'option') }}</h3>
          @if(get_field('resource_subtitle', 'option'))
            <span>{{ get_field('resource_subtitle', 'option') }}</span>
          @endif
        </header>
        <main>
          @foreach($resources as $key => $resource)
            @php
              $thumbnail  = get_the_post_thumbnail_url($resource['ID'], $size);
            @endphp
            <div class="utk-new-featured--item">
              <a href="{{ $resource['fields']['resource_url'] }}">
                <div class="utk-new-featured--item--media">
                  @if($thumbnail)
                    <img src="{{$thumbnail}}" alt="{{$resource['post_title']}}" />
                  @endif
                </div>
                <div class="utk-new-featured--item--content">
                  <h4>{{ $resource['post_title'] }}</h4>
                  <p>{{ $resource['fields']['resource_description'] }}</p>
                </div>
              </a>
            </div>
          @endforeach
        </main>
      </div>
    </div>
  </section>
@endif
