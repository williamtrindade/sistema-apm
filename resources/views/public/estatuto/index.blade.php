@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12" id="estatuto">
        <div class="  p-3">        
            <h1>Estatuto</h1>
            <div class="card-body">
                <p>Baixe e Leia nosso estatuto</p>
                <a href="{{ secure_asset('pdf/estatuto.pdf') }}" download class="btn btn-primary">Download</a>
            </div>
        </div>
    </div>
</div>
@endsection