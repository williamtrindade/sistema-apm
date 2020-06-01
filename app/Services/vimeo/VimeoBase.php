<?php

namespace App\Services\vimeo;

use Vimeo\Exceptions\VimeoRequestException;
use Vimeo\Exceptions\VimeoUploadException;
use Vimeo\Vimeo;

/**
 * Class VimeoBase
 * @package App\Services\vimeo
 * @author William Trindade<williamtrindade.contato@gmail.com>
 */
class VimeoBase
{
    /** @var Vimeo $client */
    private $client;

    /**
     * VimeoBase constructor.
     * @param null $client_id
     * @param null $client_secret
     * @param null $access_token
     */
    public function __construct($client_id = null, $client_secret = null, $access_token = null)
    {
        $this->client = new Vimeo(
            ($client_id == null) ? config('services.vimeo.client_id') : $client_id,
            ($client_secret == null) ? config('services.vimeo.client.secret') : $client_secret,
            ($access_token == null) ? config('services.vimeo.access_token') : $access_token
        );
    }

    /**
     * @param string $video_path
     * @param string $name
     * @param string $description
     * @return Video
     * @throws VimeoRequestException
     * @throws VimeoUploadException
     */
    public function uploadVideo(string $video_path, string $name, string $description): Video
    {
        $file_name = $video_path;
        $uri = $this->client->upload($file_name, [
            'name' => $name,
            'description' => $description
        ]);
        return new Video($uri, $name, $description);
    }

    /**
     * @param Video $video
     * @return string
     * @throws VimeoRequestException
     */
    public function checkTranscodeStatus(Video $video): string
    {
        $response = $this->client->request($video->getUri() . '?fields=transcode.status');
        if ($response['body']['transcode']['status'] === 'complete') {
            return Video::TRANSCODE_STATUS_FINISHED;
        } elseif ($response['body']['transcode']['status'] === 'in_progress') {
            return Video::TRANSCODE_STATUS_IN_PROGRESS;
        } else {
            return Video::TRANSCODE_STATUS_ERROR;
        }
    }

    /**
     * @param Video $video
     * @return mixed
     * @throws VimeoRequestException
     */
    public function getVideoLink(Video $video)
    {
        $response = $this->client->request($video->getUri() . '?fields=link');
        return $response['body']['link'];
    }
}