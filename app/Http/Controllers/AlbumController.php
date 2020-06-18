<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Album;
use App\Imagem;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;


/**
 * Class AlbumController
 * @package App\Http\Controllers
 */
class AlbumController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('albums.index')
            ->with('albums', Album::where('nivel', 0)->orderBy('created_at', 'DESC')->paginate('10'));
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('albums.create');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
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
     * @param $id
     */
    public function show($id)
    {
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $album = Album::find($id);
        return view('albums.edit')->with('album', $album);
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
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
     * @param $id
     * @return RedirectResponse
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

    /**
     * @param $id
     */
    public function destroyImage($id)
    {
        $imagem = Imagem::find($id);
        Storage::disk('public')->delete('imagens/' . $imagem->imagem);
        $imagem->delete();
    }

    /**
     * @param $id
     * @throws Exception
     */
    public function destroyAlbum($id) 
    {
        $album = Album::find($id);
        if($album->imagens()->count() > 0) {
            foreach ($album->imagens as $image) {
                $this->destroyImage($image->id);
            }
        }
        if($album->videos()->count() > 0) {
            foreach ($album->videos as $video) {
                $this->destroyVideo($video->id);
            }
        }
        $album->delete();

    }

    /**
     * @param $id
     * @throws Exception
     */
    private function destroyVideo($id)
    {
        /** @var VideoController $video_controller */
        $video_controller = app(VideoController::class);
        $video_controller->destroy($id);
    }
}
