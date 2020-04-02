@php

  namespace UTKLibrary\Library\Models;

@endphp
@if(is_array(get_field('resource_curate', 'option')))
  @php

    // gets resource post_ids curated in dashboard site options
    $curated = get_field('resource_curate', 'option');

    // gets all the post data foreach
    $resources = Resource::build_resources($curated);

  @endphp
  <section class="utk-new-featured">
    <div class="container">
      <div class="utk-new-featured--container">
        <header>
          <h3>@php echo get_field('resource_title', 'option') @endphp</h3>
        </header>
        <main>
          @foreach($resources as $key => $resource)
            <div class="utk-new-featured--item">
              <a href="{{ $resource['fields']['resource_url'] }}">
                <div class="utk-new-featured--item--media">
                  <span></span>
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
