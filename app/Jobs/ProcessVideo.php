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
use FFMpeg\FFProbe;
use App\Model\CustomVideo;
use Illuminate\Support\Facades\Storage;
use Log;

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
                'timeout' => 120, // the timeout for the underlying process
                'ffmpeg.threads'   => 12,   // The number of threads that FFMpeg should use
            ]);
        }

        set_time_limit(120);


        Log::info('before ffprobe');
        $ffprobe = FFProbe::create();
        $dimension = $ffprobe
            ->streams(base_path() . '/public/uploads/challenge/' . $this->fileNameTemp) // extracts streams informations
            ->videos()                      // filters video streams
            ->first()                       // returns the first video stream
            ->getDimensions();              // returns a FFMpeg\Coordinate\Dimension object

        Log::info('after ffprobe' );
        Log::info('width:'. $dimension->getWidth());
        Log::info(' height:' . $dimension->getHeight());
        Log::info('temp file:' . $this->fileNameTemp);
        Log::info('real file:' . $fileName);

            if ($this->mimeType != 'video/mp4') {

                rename(base_path() . '/public/uploads/challenge/' . $this->fileNameTemp,
                    base_path() . '/public/uploads/challenge/' . $fileName);
//                $format = new CustomVideo();
//                $video = $ffmpeg->open(base_path() . '/public/uploads/challenge/' . $this->fileNameTemp);
//                $video->save($format, base_path() . '/public/uploads/challenge/' . $fileName);
            }
            else if($dimension->getHeight() > 500 || $dimension->getWidth() > 500){

            $video = $ffmpeg->open(base_path() . '/public/uploads/challenge/' . $this->fileNameTemp);
            $dimension = new \FFMpeg\Coordinate\Dimension(480, 320);
            $mode = \FFMpeg\Filters\Video\ResizeFilter::RESIZEMODE_INSET;
            $useStandards = true;

            $format = new CustomVideo();
            $video
                ->filters()
                ->resize($dimension, $mode, $useStandards)
                ->synchronize();
            $video->save($format, base_path() . '/public/uploads/challenge/' . $fileName);
            Log::info('after save ----------------------');

            if(file_exists( base_path() . '/public/uploads/challenge/' . $fileName)) {
                Log::info('video was created++++++++++++++++++++++++++');
            }else{
                Log::info('video was not created----------------------');
            }

        }else {

            rename(base_path() . '/public/uploads/challenge/' . $this->fileNameTemp,
                base_path() . '/public/uploads/challenge/' . $fileName);
        }


        Log::info('before reopen video');
        //open resized video
        $video = $ffmpeg->open(base_path() . '/public/uploads/challenge/' . $fileName);
        $video->frame(TimeCode::fromSeconds(1))
            ->save(base_path() . '/public/uploads/challenge/' . $this->fileNameNoExtension . '.jpg');


        $this->file->is_ready = true;
        $this->file->save();

        File::delete(base_path() . '/public/uploads/challenge/'. $this->fileNameTemp);



    }
}
