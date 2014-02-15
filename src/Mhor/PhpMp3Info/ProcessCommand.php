<?php

namespace Mhor\PhpMp3Info;

use Symfony\Component\Process\Process;

/**
 * Class ProcessCommand
 *
 * @package Mhor\PhpMp3Info
 */
class ProcessCommand
{
    /**
     * @var Process
     */
    protected $process;

    /**
     * @var string
     */
    protected $command = 'mp3info ';

    /**
     * @var string
     */
    protected $arguments = ' -p"%a|%t|%n|%l|%m:%s|%r"';

    /**
     * @param string $filePath
     * @return string
     * @throws \RuntimeException
     */
    public function executeCommand($filePath)
    {
        $this->process = new Process(
            $this->command .
            $filePath .
            $this->arguments
        );

        $this->process->run();
        if (!$this->process->isSuccessful()) {
            throw new \RuntimeException($this->process->getErrorOutput());
        }
        return $this->process->getOutput();
    }

}
