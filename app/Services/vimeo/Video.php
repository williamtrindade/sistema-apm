<?php

namespace App\Services\vimeo;

use Vimeo\Exceptions\VimeoRequestException;

class Video
{
    private $uri;

    private $name;

    private $description;

    const TRANSCODE_STATUS_ERROR = 'Your video encountered an error during transcoding.';

    const TRANSCODE_STATUS_FINISHED = 'Your video finished transcoding.';

    const TRANSCODE_STATUS_IN_PROGRESS = 'Your video is still transcoding.';

    /**
     * Video constructor.
     * @param string $uri
     * @param string $name
     * @param string $description
     */
    public function __construct(string $uri, string $name, string $description)
    {
        $this->uri = $uri;
        $this->name = $name;
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     * @throws VimeoRequestException
     */
    public function getLink()
    {
        /** @var VimeoBase $service */
        $service = app(VimeoBase::class);
        return $service->getVideoLink($this);
    }
}