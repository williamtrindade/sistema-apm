<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Conta;
use App\Aviso;
use App\Imagem;

class DashboardController extends Controller
{
    public function index()
    {
        $contas = count(Conta::all());
        $avisos = Aviso::all()->count();
        $imagens = Imagem::all()->count();
        return view('admin.index', compact('contas', 'avisos', 'imagens'));
    }
}
