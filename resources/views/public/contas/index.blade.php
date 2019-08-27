@extends('layouts.app')

@section('content')
    @isset($years)
        <div class="container">
            <h1>Prestação de Contas</h1>
            <h2 class="mt-1 mb-2">Anos</h2>
            <div class="row">
                <div class="col-sm-4 mb-5">
                    <ul>
                        @foreach ($years as $year)
                            <li>
                                <a style="font-size:150%;" href="{{ route('home.contas.months', $year) }}">
                                Ano de {{ $year }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>     
    @endif

    @isset($months)
        <div class="container">
            <h1>Prestação de Contas</h1>
            <a href=" {{ route('home.contas.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Voltar</a>
            <h3 class="mt-1 mb-2">Ano de {{ $year }}</h3>
            <div class="row">
                <div class="col-md-12">
                    <ul>
                        @foreach ($months as $month)
                            <li>
                                <a style="font-size:150%;" href="{{ route('home.contas.show', [$month, $year]) }}" >
                                Mês {{ $month }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>     
    @endif
@endsection