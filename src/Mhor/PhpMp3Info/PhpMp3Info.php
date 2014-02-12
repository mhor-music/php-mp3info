<?php

namespace Mhor\PhpMp3Info;

use Symfony\Component\Filesystem\Filesystem;
use Mhor\PhpMp3Info\ProcessCommandInterface;
use Symfony\Component\Process\Process;

/**
 * Execute mp3info command line tool and parse the output.
 *
 * @package Mhor\PhpMp3Info
 */
class PhpMp3Info
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
     * @var string
     */
    protected $filePath;

    /**
     * @var ProcessCommandInterface
     */
    protected $processCommand;

    public function __construct($processCommand = null) {

        if ($processCommand === null) {
            $this->processCommand = new ProcessCommand();
        } else {
            $this->processCommand = $processCommand;
        }
    }

    /**
     * @param $filePath
     * @throws \Exception
     */
    public function extractId3Tags($filePath)
    {
        $this->setFilePath($filePath);
        $fs = new Filesystem();
        if (!$fs->exists($this->filePath)) {
            throw new \Exception('This file is not a valid file');
        }
        $this->execute();
    }

    /**
     *
     * @return void
     */
    protected function execute()
    {
        $this->parse($this->processCommand->executeCommand($this->filePath));
    }

    /**
     * @param string $filePath
     * @return PhpMp3Info
     */
    protected function setFilePath($filePath)
    {
        $this->filePath = $filePath;
        return $this;
    }

    /**
     *
     * @param string $output
     * @return void
     */
    protected function parse($output)
    {
        $result = explode('|', trim($output));
        $this->setArtist($result[0])
            ->setTitle($result[1])
            ->setTrack($result[2])
            ->setAlbum($result[3]);
    }

    /**
     * @return string
     */
    public function getAlbum()
    {
        return $this->album;
    }

    /**
     * @param string $album
     * @return PhpMp3Info
     */
    protected function setAlbum($album)
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
     * @return PhpMp3Info
     */
    protected function setArtist($artist)
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
     * @return PhpMp3Info
     */
    protected function setTitle($title)
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
     * @return PhpMp3Info
     */
    protected function setTrack($track)
    {
        $this->track = $track;
        return $this;
    }
}