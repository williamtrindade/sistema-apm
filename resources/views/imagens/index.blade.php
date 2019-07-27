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
            <h1>Galeria de Imagens</h1>
            @include('includes.notification')

            <div class="card shadow p-3">
                <h3>Inserir Imagens</h3>
                <form action="{{ route('imagens.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <!--ALBUNS-->
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="imagens">Imagens</span>
                        </div>
                        <div class="custom-file">
                            <input required class="custom-file-input" type="file" multiple name="imagem[]" id="imagens" aria-describedby="imagens">
                            <label class="custom-file-label" for="imagens">Selecione Imagens</label>
                        </div>
                    </div>
                    @error('imagem')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                    <!-- CATEGORIA -->
                    <div class="form-group">
                        <label for="categoria">Álbum</label>
                        <input required min="3" max="200" name="categoria" class="form-control" id="categoria" type="text" placeholder="Digine o nome do álbum">
                    </div>  
                    @error('categoria')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                    @enderror

                    <!-- SUB CATEGORIA -->
                    <div class="form-group">
                        <label for="categoria">SubÁlbum</label>
                        <input required min="3" max="200" name="sub_categoria" class="form-control" id="categoria" type="text" placeholder="Digine o nome do álbum">
                    </div>  
                    @error('sub_categoria')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                    @enderror

                    <!-- DESCRIÇÃO DAS FOTOS -->
                    <!-- Create the editor container -->
                    <label class="label">Conteúdo</label>
                    <div id="editor" class="field">
                        
                    </div>

                    <input type="hidden" name="conteudo" id="conteudo">                      
                    @error('conteudo')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    
                    <button type="submit" class="btn btn-success">Salvar Imagens</button>
                </form>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">    
        <div class="col-md-12">
            <div class="card shadow p-4">
                <h3>Imagens</h3>
                @if(count($imagens) > 0)
                    @include('includes.galery')
                @else
                    <div class="alert alert-primary" role="alert">
                        Sem Imagens na Galeria
                    </div>
                @endif
                @if(count($imagens) > 0)
                    {{ $imagens->links() }}
                @endif
            </div>
        </div>
    </div>
</div>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>



</script>
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