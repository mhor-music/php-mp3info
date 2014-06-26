<?php

namespace Mhor\PhpMp3Info;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Process\ProcessBuilder;

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
    protected $filePath;

    /**
     * @var ProcessBuilder
     */
    protected $processBuilder;

    /**
     * @var string
     */
    protected $command = 'mp3info';

    /**
     * @var string
     */
    protected $arguments = '-p%a|%t|%n|%l|%m:%s|%r';

    /**
     * @param ProcessBuilder $processBuilder
     */
    public function __construct($processBuilder = null)
    {
        if ($processBuilder === null) {
            $this->processBuilder = ProcessBuilder::create()
                ->setPrefix(
                    array(
                        $this->command,
                        $this->arguments
                    )
            );
        } else {
            $this->processBuilder = $processBuilder;
        }
    }

    /**
     * @param string $filePath
     * @return Mp3Tags
     * @throws \Exception
     */
    public function extractId3Tags($filePath)
    {
        $this->setFilePath($filePath);
        $fileSystem = new Filesystem();
        if (!$fileSystem->exists($this->filePath)) {
            throw new \Exception('File doesn\'t exist');
        }
        return $this->parse($this->executeCommand());
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
     * @return Mp3Tags
     */
    protected function parse($output)
    {
        $result = explode('|', trim($output));

        $mp3Tags = new Mp3Tags();
        $mp3Tags->setArtist($result[0])
            ->setTitle($result[1])
            ->setTrack($result[2])
            ->setAlbum($result[3])
            ->setLength($result[4])
            ->setBitrate($result[5])
            ->setFilePath($this->filePath);

        return $mp3Tags;
    }

    /**
     * @return string
     * @throws \RuntimeException
     */
    protected function executeCommand()
    {
        $this->processBuilder->setArguments(array());
        $this->processBuilder->add($this->filePath);
        $process = $this->processBuilder->getProcess();
        $process->run();

        if (!$process->isSuccessful()) {

            throw new \RuntimeException($process->getErrorOutput());
        }
        return $process->getOutput();
    }
}
