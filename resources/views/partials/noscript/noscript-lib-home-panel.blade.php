<style>

  #utk-panel {
    min-height: 0;
    margin-bottom: 18px;
  }

  .utk-header-super {
    background-color: transparent !important;
  }

  .utk-header-super {
    background-color: transparent !important;
  }

  .utk-hours--listing--item--hours::before {
    content: none;
  }

  .utk-hours--listing--item a:visited figure img,
  .utk-hours--listing--item a figure img {
    filter: none !important;
    opacity: 1;
  }

  #utk-lib-home-hours .utk-hours .utk-hours--listing--item--more {
    display: none !important;
  }

  #utk-lib-home-hours .utk-hours .utk-hours--listing--item--child {
    max-width: 100%;
  }

  .utk-research-tools--buttons {
    display: flex;
    margin-bottom: 47px;
  }

</style>
<div class="utk-panel-wrap utk-panel-focus-search">
  <div class="utk-panel-underlay">
    <div class="utk-panel-overlay--fade"></div>
    <div class="utk-panel-underlay--fade-horz"></div>
    <div class="utk-panel-underlay--fade-vert"></div>
  </div>
  <div class="container utk-panel-container">
    <div class="utk-panel">
      <div class="utk-panel--search">
        <div class="utk-search">
          <div class="utk-search-tabs">
            <div class="ui text menu"></div>
            <div class="ui segment active tab">
              <form method="post" action="https://www.lib.utk.edu/search" class="ui form utk-search--form">
                <span class="utk-search--icon"><span class="icon-search"></span></span>
                <div class="ui action input"><input name="value" placeholder="Search UT Libraries..."
                                                    aria-label="Search UT Libraries..." type="text">
                  <button type="submit" class="ui button">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="utk-panel--research-tools">
        <div class="utk-research-tools"><h3>Research Tools</h3>
          <div class="utk-research-tools--buttons">
            <a class="btn btn-with-icon">Databases <span class="icon-right-big"></span></a>
            <a class="btn btn-with-icon">Guides <span class="icon-right-big"></span></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
