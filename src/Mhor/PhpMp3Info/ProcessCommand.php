<?php
/**
 * Created by IntelliJ IDEA.
 * User: maxime
 * Date: 12/02/14
 * Time: 20:59
 */

namespace Mhor\PhpMp3Info;

use Symfony\Component\Process\Process;
use Mhor\PhpMp3Info\ProcessCommandInterface;

class ProcessCommand {

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
    protected $arguments = ' -pp3 -p"%a|%t|%n|%l"';

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