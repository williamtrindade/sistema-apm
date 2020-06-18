<?php

namespace App\Http\Controllers;

use App\Video;
use App\Conta;
use App\Aviso;
use App\Imagem;
use Analytics;
use Carbon\Carbon;
use Spatie\Analytics\Period;

/**
 * Class DashboardController
 * @package App\Http\Controllers
 */
class DashboardController extends Controller
{
    public function index()
    {
        $contas = count(Conta::all());
        $avisos = Aviso::all()->count();
        $imagens = Imagem::all()->count();
        $videos = Video::all()->count();
        $visitas = Analytics::fetchMostVisitedPages(Period::create(
            Carbon::createFromFormat('Y-m-d H:i:s', '2019-08-13 00:00:00'),
            Carbon::now()
        ));
        return view('admin.index', compact('contas', 'avisos', 'imagens', 'visitas', 'videos'));
    }
}
