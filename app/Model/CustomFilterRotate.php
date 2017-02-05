<?php
/**
 * Created by PhpStorm.
 * User: Sampaio
 * Date: 04/02/2017
 * Time: 18:58
 */

namespace app\Model;

use FFMpeg\Filters\Video\VideoFilterInterface;
use FFMpeg\Format\VideoInterface;
use FFMpeg\Media\Video;
class CustomFilterRotate implements VideoFilterInterface
{
    /** @var string */
    private $filter;
    /** @var integer */
    private $priority;

    private $rotate;
    /**
     * A custom filter, useful if you want to build complex filters
     *
     * @param string $filter
     * @param int    $priority
     */
    public function __construct($filter, $rotate, $priority = 0)
    {
        $this->filter = $filter;
        $this->priority = $priority;
        $this->rotate = $rotate;
    }
    /**
     * {@inheritdoc}
     */
    public function getPriority()
    {
        return $this->priority;
    }
    /**
     * {@inheritdoc}
     */
    public function apply(Video $video, VideoInterface $format)
    {
        $commands = array( $this->filter,'rotate='.$this->rotate);
        return $commands;
    }
}