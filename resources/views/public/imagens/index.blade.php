@extends('layouts.app')

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
        <h1>Galeria de Imagens</h1>
        @isset($albuns)
           
                <h4>Álbuns</h4>

                @foreach ($albuns as $album)
                    @if ($album->imagens->count() > 0)
                        <ul>
                            <li>
                                <a style="font-size:150%" href="{{ route('home.imagens.show', $album->id) }}">{{ $album->nome }}</a>
                            </li>
                        </ul>
                    @endif
                
                @endforeach
        @endisset

        @isset($imagens)
            <a href="{{ route('home.albuns.index') }}" class="btn btn-primary" ><i class="fas fa-arrow-left"></i> Voltar</a>
            <h4>Imagens do Álbum {{ $album->nome }}</h4>
                <div class="p-2">

                    @include('includes.galerypublic')
                </div>

        @endisset
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