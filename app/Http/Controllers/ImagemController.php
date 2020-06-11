<?php

namespace App\Http\Controllers;

use App\Jobs\UploadVimeoVideo;
use App\Video;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Imagem;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Carbon\Carbon;
use App\Album;
use Symfony\Component\HttpFoundation\File\Exception\ExtensionFileException;
use Vimeo\Exceptions\VimeoRequestException;
use Vimeo\Exceptions\VimeoUploadException;
use Vimeo\Laravel\Facades\Vimeo;
use Vimeo\Laravel\VimeoManager;

class ImagemController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('galeria.create');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'album_id' => 'required',
        ])->validate();
        try {
            DB::transaction(function () use ($request) {
                $medias = $request->imagem;

                foreach($medias as $media) {
                    $fileExtension = $media->extension();

                    if (in_array($fileExtension, Imagem::imgExt)) {
                        $this->uploadImage($request->all(), $media, $fileExtension);
                    } elseif (in_array($fileExtension, Imagem::videoExt)) {
                        $this->uploadVideo($request->all(), $media, $fileExtension);
                    } else {
                        throw new Exception();
                    }
                }
            });
        } catch (Exception $exception) {
            dd($exception->getMessage());
            return redirect()->back()->with('status-danger', 'Erro! Envie apenas imagens e vídeos!');
        }
        return redirect()->back()->with('status-success', 'Imagens enviadas com sucesso:)!');
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $album = Album::find($id);
        /** @var Collection $imagens */
        $imagens = $album->imagens;
        /** @var Collection $videos */
        $videos = $album->videos;
        $midias = $imagens->merge($videos);
        return view('imagens.index', compact('midias', 'album'));
    }

    /**
     * @param $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy($id)
    {
        /** @var Imagem $imagem */
        $imagem = Imagem::find($id);
        Storage::disk('public')->delete('imagens/'.$imagem->imagem);
        $imagem->delete();
        return redirect()->back()->with('status-success', 'Imagem deletada!');
    }

    /**
     * @param array $data
     * @param $image
     * @param $extension
     * @return void|RedirectResponse
     */
    private function uploadImage(array $data, $image, $extension)
    {
        $fileName = $image->getClientOriginalName() . Carbon::now() . '.' . $extension;
        if ($image->storeAs('imagens', $fileName)) {
            Imagem::create([
                'imagem'   => $fileName,
                'album_id' => $data['album_id']
            ]);
        }
    }

    /**
     * @param array $data
     * @param UploadedFile $video
     * @param $extension
     */
    private function uploadVideo(array $data, UploadedFile $video, $extension)
    {
        $fileName = $video->getClientOriginalName() . Carbon::now() . '.' . $extension;
        UploadVimeoVideo::dispatch($video, $extension);
        Video::create([
            'video'   => $fileName,
            'album_id' => $data['album_id']
        ]);
    }
}
