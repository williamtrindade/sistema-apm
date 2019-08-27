<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;

class SubAlbumController extends Controller
{
    public function create($id)
    {
        $album = Album::find($id);
        return view('sub-albums.create', compact('album'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nome' => 'required',
            'descricao' => 'required',
            'nivel' => 'required',
            'owner_album_id' => 'required'
        ]);
        Album::create($request->all());
        return redirect()->route('sub-albums.show', $request->owner_album_id)->with('status-success', 'Sub Album Criado com sucesso!');
    }

    public function show($id)
    {   
        $album = Album::find($id);
        return view('sub-albums.show', compact('album'));
        
    }
}
