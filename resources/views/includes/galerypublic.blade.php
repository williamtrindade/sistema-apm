<div class="row">
    <nav style="width: 100%;">
        <div class="nav nav-tabs" id="nav-tab" role="tablist">

            <a
                    class="nav-item nav-link active"
                    id="imagens-tab"
                    data-toggle="tab"
                    href="#nav-imagens"
                    role="tab"
                    aria-controls="nav-home"
                    aria-selected="true"
            >Imagens</a>

            <a
                    class="nav-item nav-link"
                    id="videos-tab"
                    data-toggle="tab"
                    href="#nav-videos"
                    role="tab"
                    aria-controls="nav-profile"
                    aria-selected="false"
            >Vídeos</a>

        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent" style="width: 100%">
        <div
                class="tab-pane fade show active"
                id="nav-imagens"
                role="tabpanel"
                aria-labelledby="imagens-tab"
        >
            @include('includes.images')
        </div>

        <div
                class="tab-pane fade"
                id="nav-videos"
                role="tabpanel"
                aria-labelledby="videos-tab"
        >
            @include('includes.videos')
        </div>
    </div>
</div>
