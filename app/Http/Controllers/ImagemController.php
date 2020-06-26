<?php

namespace App\Http\Controllers;

use App\Jobs\UploadVimeoVideo;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Imagem;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Carbon\Carbon;
use App\Album;
use React\EventLoop\Factory as ReactFactory;

/**
 * Class ImagemController
 * @package App\Http\Controllers
 */
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

        $video_sent = false;

        try {
            DB::transaction(function () use ($request, &$video_sent) {
                $medias = $request->imagem;

                foreach($medias as $media) {
                    $fileExtension = $media->extension();

                    if (in_array($fileExtension, Imagem::imgExt)) {
                        $this->uploadImage($request->all(), $media, $fileExtension);
                    } elseif (in_array($fileExtension, Imagem::videoExt)) {
                        $this->uploadVideo($request->all(), $media);
                        $video_sent = true;
                    } else {
                        throw new Exception();
                    }
                }
            });
        } catch (Exception $exception) {
            dd($exception->getMessage());
            return redirect()->back()->with('status-danger', 'Erro! Envie apenas imagens e vídeos!');
        }
        if ($video_sent == true) {
            return redirect()->back()->with('status-success', 'Agarde! Suas mídias já vão aparecer, seus vídeos foram para o vimeo!');
        }
        return redirect()->back()->with('status-success', 'Imagens enviadas com sucesso!');
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        /** @var Album $album */
        $album = Album::find($id);

        /** @var Collection $imagens */
        $images = $album->imagens;

        /** @var Collection $videos */
        $videos = $album->videos;

        return view('imagens.index', compact('images', 'videos', 'album'));
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
     */
    private function uploadVideo(array $data, UploadedFile $video)
    {
        // $fileExtension = $video->extension();
        $fileName = $video->getClientOriginalName() . Carbon::now();

        $video->storeAs('videos', $fileName);

        $loop = ReactFactory::create();


            $path = storage_path().'/app/public/videos/' . $fileName;
            $upload = new UploadVimeoVideo($path, $data['album_id'], $fileName);
            $upload->start();
            $loop->stop();


        $loop->run();
    }
}
