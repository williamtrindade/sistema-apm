<div class="container">
    <div class="row">
        <div class="row" style="width: 100%">
            @foreach($album->imagens as $image)
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">

                        <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""
                           data-image="{{ asset('storage/imagens/' . $image->imagem) }}"
                           data-target="#image-gallery">
                            <img class="img-thumbnail"
                                 src="{{ asset('storage/imagens/' . $image->imagem) }}"
                                 alt="Another alt text">
                        </a>

                </div>
            @endforeach
        </div>

        <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="image-gallery-title"></h4>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img id="image-gallery-image" class="img-responsive col-md-12" src="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary float-left" id="show-previous-image"><i class="fa fa-arrow-left"></i>
                        </button>

                        <button type="button" id="show-next-image" class="btn btn-secondary float-right"><i class="fa fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
