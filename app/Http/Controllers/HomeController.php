<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aviso;
use App\Conta;
use App\Imagem;
use App\Album;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContatoMail;
use DateTime;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $avisos = Aviso::orderBy('created_at', 'DESC')->take(3)->get();
        return view('home', compact('avisos'));    
    }

    public function showAllAvisos()
    {
        $avisos = Aviso::orderBy('created_at', 'DESC')->get();
        return view('public.avisos.index', compact('avisos'));
    }

    public function showAviso($id)
    {
        $aviso = Aviso::find($id);
        return view('public.avisos.show', compact('aviso'));
    }

    public function showYearsContas()
    {
        $contas = Conta::all();
        $years = array();
        foreach ($contas as $conta) {     
            $data = new DateTime($conta->data);
            $anoDaConta = $data->format('Y');
            if(!in_array($anoDaConta, $years)) {
                array_push($years, $anoDaConta);
            }
        }
        rsort($years);
        return view('public.contas.index')->with('years', $years );
    }

    public function showMonthsContas($year)
    {
        $contas = Conta::all();
        $months = array();
        foreach ($contas as $conta) {   
            $data =   new DateTime($conta->data);
            $anoDaConta = $data->format('Y');
            if($anoDaConta == $year) {
                $data =   new DateTime($conta->data);
                $mesDaConta = $data->format('m');
                if(!in_array($mesDaConta, $months)) {
                    array_push($months, $mesDaConta);
                }
            }
        }
        rsort($months);
        return view('public.contas.index', compact('months', 'year'));
    }

    public function showConta($month, $year)
    {
        $contasBanco = Conta::all();
        foreach ($contasBanco as $conta) {
            if((new Carbon($conta->data))->format('Y') == $year && (new Carbon($conta->data))->format('m') == $month ) {
                return response()->download('storage/contas/'.$conta->arquivo);
            }
        }
    }

    public function showAllAlbuns()
    {
        return view('public.imagens.index')->with('albums', Album::where('nivel', 0)
            ->orderBy('created_at', 'DESC')->get());
    }

    public function showSubAlbuns($id)
    {
        $album = album::find($id);
        return view('public.imagens.show', compact('album'));
    }

    public function showImagens($albumId, $subAlbumId)
    {
        $album = album::find($subAlbumId);
        return view('public.imagens.imagens', compact('album'));

    }
    public function showDiretoria()
    {
        return view('public.diretoria.index');
    }

    public function contatoMail(Request $request)
    {
        $avisos = Aviso::orderBy('created_at', 'DESC')->take(3)->get();
        Mail::to('apmcmsm@gmail.com')->send(new ContatoMail($request));

        return redirect()->back()
            ->with('avisos', $avisos)
            ->with('email-sent', 'Email Enviado com sucesso');
        
    }

    public function showEstatuto()
    {
        return view('public.estatuto.index');
    }

    public function showFuncionarios()
    {
        return view('public.funcionarios.index');
    }

    public function showContato()
    {
        return view('public.contato.index');
    }

    public function showHorario()
    {
        return view('public.horario.index');
    }
}
