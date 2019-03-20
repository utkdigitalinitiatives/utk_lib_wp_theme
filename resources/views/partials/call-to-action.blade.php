@php

@endphp

@todo: call-to-actions

@if( get_field('subsite_cta', 'option') )
  <ul class="subsite-cta-menu">
  @while( have_rows('subsite_cta', 'option') )
    @php(the_row())
      <li class="subsite-cta-menu--item">
        <a href="#">
          <span class="subsite-cta-menu--item--icon">
            <span class="icon-mail-alt"></span>
          </span>
          <div>@php(the_sub_field('subsite_cta_text'))</div>
          <span class="subsite-cta-menu--item--hover">
            <span class="icon-right-open"></span>
          </span>
        </a>
      </li>
  @endwhile
  </ul>
@endif
