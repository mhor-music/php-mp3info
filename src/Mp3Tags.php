<?php

namespace Mhor\PhpMp3Info;

class Mp3Tags
{
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

    public function getAlbum(): string
    {
        return $this->album;
    }

    public function setAlbum(string $album): self
    {
        $this->album = $album;

        return $this;
    }

    public function getArtist(): string
    {
        return $this->artist;
    }

    public function setArtist(string $artist): self
    {
        $this->artist = $artist;

        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getTrack(): int
    {
        return $this->track;
    }

    public function setTrack(int $track): self
    {
        $this->track = $track;

        return $this;
    }

    /**
     * @param int|string $bitrate
     * @return Mp3Tags
     */
    public function setBitrate($bitrate): self
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

    public function setLength(string $length): self
    {
        $this->length = $length;

        return $this;
    }

    public function getLength(): string
    {
        return $this->length;
    }

    public function setFilePath(string $filePath): self
    {
        $this->filePath = $filePath;

        return $this;
    }

    public function getFilePath(): string
    {
        return $this->filePath;
    }
}