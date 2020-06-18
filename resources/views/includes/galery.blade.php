
<div class="row">
    <nav style="width: 100%">
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Imagens</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Vídeos</a>

        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent" style="width: 100%;">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" style="width: 100%">
            @foreach ($images as $image)
                <div class="col-lg-3 col-md-4 col-xs-6 m-1" style="float: left">
                    <a
                            class="thumbnail"
                            href="#"
                            data-image-id=""
                            data-toggle="modal"
                            data-title=""
                            data-image="{{ asset('storage/imagens/' . $image->imagem) }}"
                            data-target="#image-gallery"
                    >
                        <img
                                class="img-thumbnail"
                                src="{{ asset('storage/imagens/'.$image->imagem) }}"
                                alt="Another alt text"
                        >
                    </a>
                    <form
                            style="top:0;position:absolute"
                            method="POST"
                            action="{{ route('imagens.destroy', $image->id) }}"
                    >
                        @csrf
                        @method('DELETE')
                        <button
                                class="btn btn-sm btn-danger"
                                style="top:0"
                                type="submit"
                        >
                            <i  class="fas fa-trash"></i> Apagar
                        </button>
                    </form>
                </div>
            @endforeach
        </div>

        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            @foreach ($videos as $video)
                <div class="col-lg-3 col-md-4 col-xs-6  img-fluid m-4" style="float: left">
                    <a
                            class="thumbnail"
                            href="#"
                            data-image-id=""
                            data-toggle="modal"
                            data-title=""
                            data-image="{{ asset('storage/imagens/' . $video->video) }}"
                            data-target="#image-gallery"
                    >
                        <iframe
                                src="https://player.vimeo.com/video/{{explode('/', $video->video)[2]}}"
                                width="{video_width}" height="{video_height}"
                                frameborder="0"
                                title="{video_title}"
                                webkitallowfullscreen
                                mozallowfullscreen
                                allowfullscreen
                        >
                        </iframe>
                    </a>
                    <form
                            style="top:0;position:absolute"
                            method="POST"
                            action="{{ route('videos.destroy', $video->id) }}"
                    >
                        @csrf
                        @method('DELETE')
                        <button
                                class="btn btn-sm btn-danger"
                                style="top:0"
                                type="submit"
                        >
                            <i  class="fas fa-trash"></i> Apagar
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</div>
