<?php

namespace Mhor\PhpMp3Info;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Process\Process;

/**
 * Execute mp3info command line tool and parse the output.
 *
 * @package Mhor\PhpMp3Info
 */
class PhpMp3Info
{
    protected $filePath;

    protected $command;

    protected $arguments;

    public function __construct(string $command = 'mp3info', string $arguments = "-p'%a|%t|%n|%l|%m:%s|%r'")
    {
        $this->command   = $command;
        $this->arguments = $arguments;
    }

    public function extractId3Tags(string $filePath): Mp3Tags
    {
        $this->setFilePath($filePath);
        $fileSystem = new Filesystem();
        if (!$fileSystem->exists($this->filePath)) {
            throw new \Exception('File doesn\'t exist');
        }

        return $this->parse($this->executeCommand());
    }

    protected function setFilePath(string $filePath): self
    {
        $this->filePath = $filePath;

        return $this;
    }

    protected function parse(string $output): Mp3Tags
    {
        $result = explode('|', trim($output));

        $mp3Tags = new Mp3Tags();
        $mp3Tags->setArtist($result[0])
                ->setTitle($result[1])
                ->setTrack((int)$result[2])
                ->setAlbum($result[3])
                ->setLength($result[4])
                ->setBitrate($result[5])
                ->setFilePath($this->filePath);

        return $mp3Tags;
    }

    protected function executeCommand(): string
    {
        $process = new Process($this->command.' '.$this->arguments. ' '.$this->filePath);
        $process->run();

        if (!$process->isSuccessful()) {

            throw new \RuntimeException($process->getErrorOutput());
        }

        return $process->getOutput();
    }
}
