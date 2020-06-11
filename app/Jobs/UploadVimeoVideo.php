<?php

namespace App\Jobs;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Http\UploadedFile;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Vimeo\Exceptions\VimeoRequestException;
use Vimeo\Exceptions\VimeoUploadException;
use Vimeo\Laravel\VimeoManager;
use Vimeo\Vimeo;

/**
 * Class UploadVimeoVideo
 * @package App\Jobs
 */
class UploadVimeoVideo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @param UploadedFile $video
     * @param $extension
     * @throws VimeoRequestException
     * @throws VimeoUploadException
     */
    public function __construct(UploadedFile $video, $extension)
    {
        $fileName = $video->getClientOriginalName() . Carbon::now() . '.' . $extension;

        /** @var Vimeo $vimeo */
        $vimeo = app(VimeoManager::class);

        $vimeo->upload($video->getRealPath());
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
    }
}
