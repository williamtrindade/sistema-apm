@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="columns is-multiline">
        <div class="column is-12-desktop is-12-mobile">
            <h1 class="title is-4">Galeria de Imagens</h1>
            <div class="box">
                <form action="{{ route('imagens.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="field">
                        <label class="label">Selecione imagens</label>                              
                        <div class="control">
                            <button type="submit" class="button is-success">Cadastrar</button>
                            <input type="file" multiple name="imagem[]" id="imagem" >
                            @error('imagem')
                                <p class="help is-danger">{{$message}}</p>
                            @enderror
                            
                        </div>
                    </div>
                   
                </form>
            </div>
            <div class="box">    
                <div class="columns is-multiline">
                    @if(count($imagens) > 0)
                        @foreach ($imagens as $imagem)
                        <div class="column is-one-quarter-desktop is-half-tablet">
                            <div class="card">
                                <div class="card-image">
                                    <figure class="image is-3by2">
                                        <img src="{{asset('storage/imagens/'.$imagem->imagem)}}">
                                    </figure>
                                </div>
                                <footer class="card-footer">
                                    <form method="POST" action="{{ route('imagens.destroy', $imagem->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="button is-danger" type="submit"><i class="fas fa-trash"></i></button>
                                    </form>  
                                </footer>
                            </div>
                        </div> 
                        @endforeach
                        
                    @else
                        <div class="column is-12">
                            <div class="box">
                                <h1 class="title is-6">Sem Imagens na galeria</h1>
                            </div>
                        </div>
                    @endif
                    
                </div>
                @if(count($imagens) > 0)
                    {{ $imagens->links() }}
                @endif
            </div>
        </div>
    </div>
</div>

@endsection