<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Date;
use App\Conta;
use Storage;
use Carbon\Carbon;
use DateTime;

class ContaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contas.index')->with('contas', Conta::orderBy('data', 'DESC')->paginate(8));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'arquivo' => 'required|mimes:pdf|max:2048',
            'data' => 'required'
        ]);
        $fileUploaded = $request->arquivo;
        $fileExtension = $fileUploaded->extension();
        $fileName = Carbon::now().'.'.$fileExtension;
        //$date = DateTime::createFromFormat('Y-m-d', $request->data);
        if($request->arquivo->storeAs('contas', $fileName)) {
            Conta::create([
                'arquivo' => $fileName, 
                'data' => DateTime::createFromFormat('Y-m-d', $request->data)
            ]);
            return redirect()->action('ContaController@index')->with('status-success', 'Arquivo enviado :)!');
        } else {
            return redirect()->action('ContaController@index')->with('status-danger', 'Erro ao Salvar Arquivo :[!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Conta $conta)
    {
        Storage::disk('public')->delete('contas/'.$conta->arquivo);
        $conta->delete();
        return redirect()->back()->with('status-success', 'Arquivo deletado!');
    }
}
