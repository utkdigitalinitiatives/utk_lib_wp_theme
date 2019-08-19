@php
  $notice = UTKLibrary\Library\Models\Notice::render_notice();
@endphp

@if($notice)
  @php

    $title    = $notice['title'];
    $type     = $notice['fields']['notice_type'];
    $message  = $notice['fields']['notice_message'];

  @endphp
  @if(is_front_page() && is_main_site())
    <div class="section-notice">
      <div class="container">
  @endif
        <div id="utk-lib-notice" class="library-notice library-notice-{{$type}}">
          <div class="library-notice--wrap">
            <div class="library-notice--content">
              <h3>@php print $title; @endphp</h3>
              @if ($message != '')
                <div>@php print $message; @endphp</div>
              @endif
            </div>
          </div>
        </div>
  @if(is_front_page() && is_main_site())
      </div>
    </div>
  @endif
  @if(in_array($type, ['danger', 'warning']))
    <script>
      /*
       * es6 script for adding override class to body tag
       * not absolutely necessary, yet will help maximize impact
       */
      let body = document.body;
      body.classList.add("library-notice-override");
    </script>
  @endif
@endif
