<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Aviso;
use Storage;
use Carbon\Carbon;

class AvisoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('avisos.index')->with('avisos', Aviso::orderBy('created_at', 'DESC')->paginate(8));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('avisos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:255',
            'pdf' => 'mimes:pdf|max:2048',
        ]);
        if($request->hasFile('pdf')) {
            $fileUploaded = $request->pdf;
            $fileExtension = $fileUploaded->extension();
            $fileName = Carbon::now().'.'.$fileExtension;
            if($request->pdf->storeAs('avisos', $fileName)) {
                Aviso::create([
                    'titulo' => $request->titulo, 
                    'conteudo' => $request->conteudo, 
                    'pdf' => $fileName,
                ]);
            } else {
                return redirect()->back()->with('status-danger', 'Erro ao Salvar Arquivo :[!');
            }
        } else {
            Aviso::create($request->all());
        }
        return redirect()->action('AvisoController@index')->with('status-success', 'Aviso criado!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('avisos.edit')->with('aviso', Aviso::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required',
            'conteudo' => 'required'
        ]);
        Aviso::find($id)->update($request->all());
        return redirect()->action('AvisoController@index')->with('status-success', 'Aviso Editado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aviso = Aviso::find($id);
        if($aviso->pdf) {
            Storage::disk('public')->delete('avisos/'.$aviso->pdf);
            $aviso->delete();
            return redirect()->back()->with('status-success', 'Arquivo do Aviso deletado!');
        } else {
            $aviso->delete();
            return redirect()->back()->with('status-success', 'Aviso deletado!');
        }        
    }
}
