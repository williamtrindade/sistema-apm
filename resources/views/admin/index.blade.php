@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>DashBoard</h1>

        <div class="row">
            <div class="col-md-12">
                <div class="card shadow p-3 mb-3">
                    <canvas id="myChart" width="400" height="100"></canvas>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
                    <script>
                        var ctx = document.getElementById('myChart');
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: [
                                    @foreach($visitas->take(11) as $visita)
                                        @if($visita['pageTitle'] == 'Laravel')
                                        @else
                                            '{{ $visita['url']}}',
                                        @endif
                                    @endforeach
                                ],
                                datasets: [{
                                    label: 'Número de Visitas',
                                    data: [
                                        @foreach($visitas->take(11) as $visita)
                                            @if($visita['pageTitle'] == 'Laravel')
                                            @else
                                                '{{ $visita['pageViews']}}',
                                            @endif
                                        @endforeach
                                    ],
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(255, 206, 86, 0.2)',
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(153, 102, 255, 0.2)',
                                        'rgba(255, 159, 64, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                                }
                            }
                        });
                    </script>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-header">
                        Prestação de Contas
                    </div>
                    <div class="card-body">
                        <h1>{{ $contas }}</h1>
                        <p class="card-text">Cadastrada(s).</p>
                        <a href="{{ route('contas.index') }}" class="btn btn-primary">Acesse</a>
                    </div>
                  </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-header">
                        Imagens
                    </div>
                    <div class="card-body">
                        <h1>{{ $imagens }}</h1>
                        <p class="card-text">Cadastrada(s).</p>
                        <a href="{{ route('albums.index') }}" class="btn btn-primary">Acesse</a>
                    </div>
                  </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-header">
                        Avisos
                    </div>
                    <div class="card-body">
                        <h1>{{ $avisos }}</h1>
                        <p class="card-text">Cadastrado(s).</p>
                        <a href="{{ route('avisos.index') }}" class="btn btn-primary">Acesse</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection