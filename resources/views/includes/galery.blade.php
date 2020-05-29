<div class="row">
		<div class="row">
            @foreach ($imagens as $imagem)
                <div class="col-lg-3 col-md-4 col-xs-6  img-fluid">
                    <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="" data-image="{{ secure_asset('storage/imagens/'.$imagem->imagem) }}" data-target="#image-gallery">
                        <img class="img-thumbnail " src="{{ secure_asset('storage/imagens/'.$imagem->imagem) }}" alt="Another alt text">
                    </a>
                    <form style="top:0;position:absolute" method="POST" action="{{ route('imagens.destroy', $imagem->id) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" style="top:0" type="submit"><i  class="fas fa-trash"></i> Apagar</button>
                    </form>  
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