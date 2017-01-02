<?php
/**
 * Created by PhpStorm.
 * User: Sampaio
 * Date: 21/11/2016
 * Time: 22:11
 */

namespace app;

use FFMpeg\Format\Video;
class CustomVideo extends Video\DefaultVideo
{
    /** @var boolean */
    private $bframesSupport = true;

    public function __construct($audioCodec = 'libmp3lame', $videoCodec = 'libx264')
    {
        $this
            ->setAudioCodec($audioCodec)
            ->setVideoCodec($videoCodec);
    }

    /**
     * {@inheritDoc}
     */
    public function supportBFrames()
    {
        return $this->bframesSupport;
    }

    /**
     * @param $support
     *
     * @return X264
     */
    public function setBFramesSupport($support)
    {
        $this->bframesSupport = $support;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getAvailableAudioCodecs()
    {
        return array('aac', 'libvo_aacenc', 'libfaac', 'libmp3lame', 'libfdk_aac');
    }

    /**
     * {@inheritDoc}
     */
    public function getAvailableVideoCodecs()
    {
        return array('libx264');
    }

    /**
     * {@inheritDoc}
     */
    public function getPasses()
    {
        return 2;
    }

    /**
     * @return int
     */
    public function getModulus()
    {
        return 2;
    }
}