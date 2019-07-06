<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function avisos()
    {
        return view('avisos');
    }

    public function contas()
    {
        return view('contas');
    }

    public function imagens()
    {
        return view('imagens');
    }
}
