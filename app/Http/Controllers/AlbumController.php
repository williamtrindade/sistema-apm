<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use App\Imagem;
use Storage;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('albums.index')
            ->with('albums', Album::where('nivel', 0)->orderBy('created_at', 'DESC')->paginate('10'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('albums.create');
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
            'nome' => 'required',
            'descricao' => 'required',
            'nivel' => 'required'
        ]);
        Album::create($request->all());
        return redirect()->route('albums.index')->with('status-success', 'Álbum Criado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {  
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 
    public function edit($id)
    {
        $album = Album::find($id);
        return view('albums.edit')->with('album', $album);
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
        $album = Album::find($id);
        $album->update($request->all());
        if($album->nivel == 0) {
            return redirect()->route('albums.index')->with('status-success', 'Álbum editado com sucesso!');
        }
        return redirect()->route('sub-albums.show', $album->owner_album_id)->with('status-success', 'Álbum editado com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $album = Album::find($id);
        if($album->imagens()->count() > 0) {
            foreach ($album->imagens as $image) {
                $this->destroyImage($image->id);
            }
        }
        if($album->albums()->count() > 0) {
            foreach ($album->albums as $albumF) {
                $this->destroyAlbum($albumF->id);
            }
        }
        $album->delete();
        return redirect()->route('albums.index')->with('status-success', 'Álbum '.$album->nome.' apagado com sucesso!');

    }

    public function destroyImage($id)
    {
        $imagem = Imagem::find($id);
        Storage::disk('public')->delete('imagens/'.$imagem->imagem);
        $imagem->delete();
    }

    public function destroyAlbum($id) {
        $album = Album::find($id);
        if($album->imagens()->count() > 0) {
            foreach ($album->imagens as $image) {
                $this->destroyImage($image->id);
            }
        }
        $album->delete();

    }
}
