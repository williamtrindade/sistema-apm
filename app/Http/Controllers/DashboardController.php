<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Conta;
use App\Aviso;
use App\Imagem;
use Analytics;
use Spatie\Analytics\Period;

class DashboardController extends Controller
{
    public function index()
    {
        $contas = count(Conta::all());
        $avisos = Aviso::all()->count();
        $imagens = Imagem::all()->count();

        $visitas = Analytics::fetchMostVisitedPages(Period::days(30));
//dd($visitas);
        return view('admin.index', compact('contas', 'avisos', 'imagens', 'visitas'));
    }
}
