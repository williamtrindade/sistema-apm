@extends('layouts.app')

@section('content')
<div class="columns">
    <div class="column is-12-desktop">
        <section class="hero is-success">
            <div class="hero-body">
                <div class="container">
                    <div class="clumns">
                        <div class="column is-1-desktop is-2-offset is-1-tablet is-4-mobile is-centered-mobile" style="float:left;">
                            <img src="{{ asset('img/logoe.png')}}" alt="">
                        </div>
                        <div class="column is-9-desktop is-12-mobile" style="padding-top:2%;float:left;">
                            <h1 class="title is-4">
                                Associação de Pais e Mestres do Colégio Militar de Santa Maria
                            </h1>
                            <h2 class="subtitle">
                                
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<div class="container">
    <div class="columns">
        <div class="column is-6-desktop">
            <div class="box">
                <h1 class="title is-6">
                    Avisos
                </h1>    
            </div>
                       
        </div>
        <div class="column is-6-desktop">
            <div class="box">
                <h1 class="title is-6">
                    Avisos
                </h1>    
            </div>
        </div>
    </div>
    <div class="columns">
        <div class="column is-12-desktop">
            <div class="box">
                <h1 class="title is-6 is-center">
                    Contato
                </h1>   
            </div>
        </div>
    </div>
</div>

@endsection
