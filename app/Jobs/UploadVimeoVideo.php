<?php

namespace App\Jobs;

use App\Video;
use Illuminate\Support\Facades\Storage;
use Thread;
use Vimeo\Laravel\VimeoManager;

/**
 * Class UploadVimeoVideo
 * @package App\Jobs
 */
class UploadVimeoVideo
{
    /** @var $video */
    private $video;

    /** @var int */
    private $album_id;

    /** @var string */
    private $fileName;

    /**
     * Create a new job instance.
     *
     * @param $video
     * @param $album_id
     * @param $fileName
     */
    public function __construct( $video, $album_id, $fileName)
    {
        $this->video = $video;
        $this->album_id = $album_id;
        $this->fileName = $fileName;
    }


    public function start()
    {
        $vimeo = app(VimeoManager::class);

        Video::Create([
            'video'   => $vimeo->upload($this->video),
            'album_id' => $this->album_id
        ]);
        Storage::disk('public')->delete('videos/'.$this->fileName);
    }
}
