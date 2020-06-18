@extends('layouts.admin')

@section('content')
<style>
    .btn:focus, .btn:active, button:focus, button:active {
        outline: none !important;
        box-shadow: none !important;
    }

    #image-gallery .modal-footer{
        display: block;
    }

    .thumb{
        margin-top: 15px;
        margin-bottom: 15px;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Galeria</h1>
            <a href="{{ route('sub-albums.show', $album->owner_album_id) }}" class="btn btn-secondary" style="margin-bottom:2%;"><i class="fas fa-arrow-left"></i> Voltar</a><br>
            @include('includes.notification')

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('albums.index') }}">Albums</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('sub-albums.show', $album->ownerAlbum->id) }}">{{ $album->ownerAlbum->nome }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $album->nome  }}</li>
                </ol>
            </nav>
            <div class="card shadow p-3">
                <h3>Inserir Imagens / Vídeos</h3>

                <form enctype="multipart/form-data" id="formUpload" method="POST" action="{{ route('imagens.store') }}">
                    @csrf
                    @method('POST')

                    <!--IMAGENS-->
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="imagens">Imagens</span>
                        </div>
                        <div class="custom-file">
                            <input max="2048" required class="custom-file-input" type="file" multiple name="imagem[]" id="imagens" aria-describedby="imagens">
                            <label class="custom-file-label" for="imagens">Selecione Imagens / vídeos do seu device</label>
                        </div>
                    </div>
                    @error('imagem')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                    <!--ALBUM ID-->
                    <input type="hidden" name="album_id" value="{{ $album->id }}" id="album_id">
                    
                    <button type="submit" class="btn btn-success">Inserir</button>
                </form>

            </div>
        </div>
    </div>
    <hr>
    <div class="row">    
        <div class="col-md-12">


                @if((count($images) + count($videos)) > 0)
                    @include('includes.galery')
                @else
                    <div class="alert alert-primary" role="alert">
                        Sem Imagens na Galeria
                    </div>
                @endif

        </div>
    </div>
</div>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    let modalId = $('#image-gallery');

    $(document)
    .ready(function () {

        loadGallery(true, 'a.thumbnail');

        //This function disables buttons when needed
        function disableButtons(counter_max, counter_current) {
        $('#show-previous-image, #show-next-image')
            .show();
        if (counter_max === counter_current) {
            $('#show-next-image')
            .hide();
        } else if (counter_current === 1) {
            $('#show-previous-image')
            .hide();
        }
        }

        /**
        *
        * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
        * @param setClickAttr  Sets the attribute for the click handler.
        */

        function loadGallery(setIDs, setClickAttr) {
        let current_image,
            selector,
            counter = 0;

        $('#show-next-image, #show-previous-image')
            .click(function () {
            if ($(this)
                .attr('id') === 'show-previous-image') {
                current_image--;
            } else {
                current_image++;
            }

            selector = $('[data-image-id="' + current_image + '"]');
            updateGallery(selector);
            });

        function updateGallery(selector) {
            let $sel = selector;
            current_image = $sel.data('image-id');
            $('#image-gallery-title')
            .text($sel.data('title'));
            $('#image-gallery-image')
            .attr('src', $sel.data('image'));
            disableButtons(counter, $sel.data('image-id'));
        }

        if (setIDs == true) {
            $('[data-image-id]')
            .each(function () {
                counter++;
                $(this)
                .attr('data-image-id', counter);
            });
        }
        $(setClickAttr)
            .on('click', function () {
            updateGallery($(this));
            });
        }
    });

    // build key actions
    $(document)
    .keydown(function (e) {
        switch (e.which) {
        case 37: // left
            if ((modalId.data('bs.modal') || {})._isShown && $('#show-previous-image').is(":visible")) {
            $('#show-previous-image')
                .click();
            }
            break;

        case 39: // right
            if ((modalId.data('bs.modal') || {})._isShown && $('#show-next-image').is(":visible")) {
            $('#show-next-image')
                .click();
            }
            break;

        default:
            return; // exit this handler for other keys
        }
        e.preventDefault(); // prevent the default action (scroll / move caret)
    });
</script>

@endsection