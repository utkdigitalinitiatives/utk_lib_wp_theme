<div id="detach-sticky-top"></div>
@include('volumes.components.volume-masthead')
<div class="container page-body--container">
    <div class="page-body--flex page-body--flex-volumes">
        <main class="page-body--content page-body--content-volumes">
            @include('volumes.content-volume')
        </main>
        <aside class="page-body--aside page-body--aside-right">
            @include('volumes.partials.related-links')
            <iframe style="border: 0; height: 470px;"
                    src="https://bandcamp.com/EmbeddedPlayer/album=1216554894/size=large/bgcol=ffffff/linkcol=0687f5/tracklist=false/track=3620167624/transparent=true/"
                    seamless><a href="http://utklibraries.bandcamp.com/album/boundless">Boundless by R.B. Morris</a>
            </iframe>
        </aside>
    </div>
    <div id="detach-sticky-bottom"></div>
</div>
