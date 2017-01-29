<?php

namespace App\Jobs;

use App;
use Illuminate\Support\Facades\File;
use App\Jobs\Job;
use App\Model\FileHio;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use FFMpeg\FFMpeg;
use FFMpeg\Coordinate\TimeCode;
use FFMpeg\Coordinate\Dimension;
use FFMpeg\Format\Video;
use App\Model\CustomVideo;

class ProcessVideo extends Job implements ShouldQueue
{


    use InteractsWithQueue, SerializesModels;


    protected $file;
    protected $mimeType;
    protected $fileNameTemp;
    protected $fileNameNoExtension;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(FileHio $file, $mimeType, $fileNameTemp, $fileNameNoExtension)
    {
        $this->file = $file;
        $this->mimeType = $mimeType;
        $this->fileNameTemp = $fileNameTemp;
        $this->fileNameNoExtension = $fileNameNoExtension;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $fileName = $this->file->filename;
        if (App::environment('local')) {
            $ffmpeg = FFMpeg::create([
                'ffmpeg.binaries' => 'D:/documents/laravel/ffmpeg/bin/ffmpeg.exe', // the path to the FFMpeg binary
                'ffprobe.binaries' => 'D:/documents/laravel/FFmpeg/bin/ffprobe.exe', // the path to the FFProbe binary
                'timeout' => 3600 // the timeout for the underlying process
            ]);
        } else {
            $ffmpeg = FFMpeg::create([
                'ffmpeg.binaries' => '/usr/bin/ffmpeg', // the path to the FFMpeg binary
                'ffprobe.binaries' => '/usr/bin/ffprobe', // the path to the FFProbe binary
                'timeout' => 3600, // the timeout for the underlying process
            ]);
        }


        $video = $ffmpeg->open(base_path() . '/public/uploads/challenge/' . $this->fileNameTemp);


        $dimension = new \FFMpeg\Coordinate\Dimension(480, 320);
        $mode = \FFMpeg\Filters\Video\ResizeFilter::RESIZEMODE_INSET;
        $useStandards = true;

        $format = new CustomVideo();

        $video
            ->filters()
            ->resize($dimension, $mode, $useStandards)
            ->synchronize();

//                $video->filters()
//                    ->resize(new Dimension(320, 240), \FFMpeg\Filters\Video\ResizeFilter::RESIZEMODE_INSET);
        $video->save($format, base_path() . '/public/uploads/challenge/' . $fileName);


        //open resized video
        $video = $ffmpeg->open(base_path() . '/public/uploads/challenge/' . $this->fileNameTemp);

        $video->frame(TimeCode::fromSeconds(1))
            ->save(base_path() . '/public/uploads/challenge/' . $this->fileNameNoExtension . '.jpg');

        if ($this->mimeType != 'video/mp4') {
//                $ffmpeg->getFFMpegDriver()->listen(new \Alchemy\BinaryDriver\Listeners\DebugListener());
//                $ffmpeg->getFFMpegDriver()->on('debug', function ($message) {
//                    echo '......aaaa.....'.$message."\n";
//                });

            $fileName = $this->fileNameNoExtension . '.mp4';
            $format = new CustomVideo();
            $video->save($format, base_path() . '/public/uploads/challenge/' . $this->fileNameNoExtension . '.mp4');
        }


        File::delete(base_path() . '/public/uploads/challenge/'. $this->fileNameTemp);



    }
}
