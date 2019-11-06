<div id="detach-sticky-top"></div>
@include('volumes.components.volume-masthead')
<div class="container page-body--container">
    <div class="page-body--flex page-body--flex-volumes">
        <main class="page-body--content page-body--content-volumes">
            @include('volumes.content-volume')
        </main>
        <aside class="page-body--aside page-body--aside-right">
            <div class="utk-item-list">
                <header>
                    <h3>See Also</h3>
                </header>
                <ul>
                    <li><a href="#">R.B. Morris Artist Statement</a></li>
                    <li><a href="#">Thoughts and Reflections on James Agee and A Death in the Family by R.B. Morris</a></li>
                    <li><a href="#">Dindo Documentary</a></li>
                </ul>
            </div>
            <iframe style="border: 0; height: 470px;"
                    src="https://bandcamp.com/EmbeddedPlayer/album=1216554894/size=large/bgcol=ffffff/linkcol=0687f5/tracklist=false/track=3620167624/transparent=true/"
                    seamless><a href="http://utklibraries.bandcamp.com/album/boundless">Boundless by R.B. Morris</a>
            </iframe>
            <div class="aside-subsite-custom-widgets">
                <section class="widget text-3 widget_text"><h3>About Boundless</h3>
                    <div class="textwidget">
                        <p>Nullam malesuada mattis nisl, vitae aliquet tellus. Aliquam lacinia elem euismod. Sed nec neque ex.</p>
                        <p><a href="#">More from the Boundless Series</a></p>
                    </div>
                </section>
            </div>
            @include('partials.sidebar')
        </aside>
    </div>
    <div id="detach-sticky-bottom"></div>
</div>
