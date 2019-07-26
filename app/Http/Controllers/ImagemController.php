<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imagem;
use App\ImagemCategoria;
use Storage;
use Carbon\Carbon;

class ImagemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = ImagemCategoria::all();
        $imagens = Imagem::paginate(12);
        return view('galeria.index', compact('imagens', 'categorias'));
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
            'categoria' => 'required|min:3|max:200',
            'imagem' => 'required',
            'imagem.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        //dd($request->imagem);
        $categoriaBanco = ImagemCategoria::where('nome', $request->categoria)->first();
        $categoria = NULL;
        if($categoriaBanco) {
            $categoria = $categoriaBanco;
        } else {
            ImagemCategoria::create(['nome' => $request->categoria]);
            $categoria = ImagemCategoria::where('nome', $request->categoria)->first();
        }
        // Salva Imagens
        
        $imagensUploades = $request->imagem;
        foreach($imagensUploades as $image) {
            $fileExtension = $image->extension();
            $fileName = $image->getClientOriginalName().Carbon::now().$fileExtension;
            if($image->storeAs('imagens', $fileName)) {
                Imagem::Create([
                    'imagem' => $fileName, 
                    'category_id' => $categoria->id
                ]);
            } else {
                return redirect()->back()->with('status-danger', 'Ocorreu um erro enquanto salvava as imagems :[!');
            }
        }
        return redirect()->back()->with('status-success', 'Imagens enviadas com sucesso:)!');     
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
