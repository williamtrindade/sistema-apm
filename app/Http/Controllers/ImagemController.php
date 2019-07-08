<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imagem;
use Storage;

class ImagemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('galeria.index')->with('imagens', Imagem::paginate(12));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('galeria.create');
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
            'imagem' => 'required',
            'imagem.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $imagensUploades = $request->imagem;
        foreach($imagensUploades as $image) {
            $fileExtension = $image->extension();
            $fileName = $image->getClientOriginalName().$fileExtension;
            if($image->storeAs('imagens', $fileName)) {
                Imagem::Create(['imagem' => $fileName]);
            } else {
                return redirect()->back()->with('status-danger', 'Erro ao Salvar imagems :[!');
            }
        }
        return redirect()->back()->with('status-success', 'Imagens enviadas :)!');        
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
    public function destroy($id)
    {
        $imagem = Imagem::find($id);
        Storage::disk('public')->delete('imagens/'.$imagem->imagem);
        $imagem->delete();
        return redirect()->back()->with('status-success', 'Imagem deletada!');
    }
}
