<div class="container">
    <div class="row">
        <div class="row">
            @foreach($album->videos as $video)
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">

                    <iframe
                            data-toggle="modal"
                            data-target="#video-gallery"
                            src="https://player.vimeo.com/video/{{explode('/', $video->video)[2]}}"
                            width="{video_width}"
                            height="{video_height}"
                            frameborder="0"
                            title="{video_title}"
                            webkitallowfullscreen
                            mozallowfullscreen
                            allowfullscreen
                    ></iframe>

                </div>
            @endforeach
        </div>
    </div>
</div>