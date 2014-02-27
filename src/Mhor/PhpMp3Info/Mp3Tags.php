<?php

namespace Mhor\PhpMp3Info;

class Mp3Tags {
    /**
     * @var string
     */
    protected $artist;

    /**
     * @var int
     */
    protected $track;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $album;

    /**
     * Integer when it's CBR
     * Equals 'Variable' when it's VBR
     * @var string|int
     */
    protected $bitrate;

    /**
     * @var string
     */
    protected $length;

    /**
     * @var string
     */
    protected $filePath;

    /**
     * @return string
     */
    public function getAlbum()
    {
        return $this->album;
    }

    /**
     * @param string $album
     * @return Mp3Tags
     */
    public function setAlbum($album)
    {
        $this->album = $album;
        return $this;
    }

    /**
     * @return string
     */
    public function getArtist()
    {
        return $this->artist;
    }

    /**
     * @param string $artist
     * @return Mp3Tags
     */
    public function setArtist($artist)
    {
        $this->artist = $artist;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Mp3Tags
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return int
     */
    public function getTrack()
    {
        return $this->track;
    }

    /**
     * @param int $track
     * @return Mp3Tags
     */
    public function setTrack($track)
    {
        $this->track = $track;
        return $this;
    }

    /**
     * @param int|string $bitrate
     * @return Mp3Tags
     */
    public  function setBitrate($bitrate)
    {
        $this->bitrate = $bitrate;
        return $this;
    }

    /**
     * @return int|string
     */
    public function getBitrate()
    {
        return $this->bitrate;
    }

    /**
     * @param string $length
     * @return Mp3Tags
     */
    public function setLength($length)
    {
        $this->length = $length;
        return $this;
    }

    /**
     * @return string
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @param string $filePath
     * @return Mp3Tags
     */
    public function setFilePath($filePath)
    {
        $this->filePath = $filePath;
        return $this;
    }

    /**
     * @return string
     */
    public function getFilePath()
    {
        return $this->filePath;
    }
}