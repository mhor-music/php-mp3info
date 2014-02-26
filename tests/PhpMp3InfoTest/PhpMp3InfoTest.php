<?php

namespace PhpMp3InfoTest;

use Mhor\PhpMp3Info\PhpMp3Info;
use PHPUnit_Framework_TestCase;
use \RuntimeException;

class PhpMp3InfoTest extends PHPUnit_Framework_TestCase {

    /**
     * @var string filePath
     */
    private $filePath;

    /**
     * @var PhpMp3Info
     */
    protected $mp3info;

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function createWorkingProcess()
    {
        $mockProcess = $this->getMock('Process', array('run', 'getOutput', 'isSuccessful'));

        $mockProcess->expects($this->any())
            ->method('run')
            ->will($this->returnValue(null));

        $mockProcess->expects($this->any())
            ->method('getOutput')
            ->will($this->returnValue('ZOE LEELA|Pop Up|1|Digital Guilt|1:44|Variable'));

        $mockProcess->expects($this->any())
            ->method('isSuccessful')
            ->will($this->returnValue(true));
        return $mockProcess;
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function createErrorProcess()
    {
        $mockProcess = $this->getMock('Process', array('run', 'isSuccessful', 'getErrorOutput'));

        $mockProcess->expects($this->any())
            ->method('run')
            ->will($this->returnValue(null));

        $mockProcess->expects($this->any())
            ->method('getErrorOutput')
            ->will($this->returnValue(''));

        $mockProcess->expects($this->any())
            ->method('isSuccessful')
            ->will($this->returnValue(false));

        return $mockProcess;
    }

    /**
     * @param bool $workingProcess
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function createProcessBuilderMock($workingProcess = true)
    {
        if ($workingProcess === false) {
            $mockProcess = $this->createErrorProcess();
        } else {
            $mockProcess = $this->createWorkingProcess();
        }

        $mock = $this->getMock('ProcessBuilder', array('add', 'getProcess'));
        $mock->expects($this->any())
            ->method('add')
            ->will($this->returnValue(null));

        $mock->expects($this->any())
            ->method('getProcess')
            ->will($this->returnValue($mockProcess));

        return $mock;
    }

    public function testTags()
    {
        $this->filePath =  __DIR__ . '/../testFiles/ZOE.LEELA_-_Pop_Up.mp3';
        $this->mp3info = new PhpMp3Info($this->createProcessBuilderMock(true));
        $mp3tags = $this->mp3info->extractId3Tags($this->filePath);

        $this->assertEquals('Digital Guilt', $mp3tags->getAlbum());
        $this->assertEquals('1', $mp3tags->getTrack(), '1');
        $this->assertEquals('Pop Up', $mp3tags->getTitle());
        $this->assertEquals('ZOE LEELA', $mp3tags->getArtist());
        $this->assertEquals('1:44', $mp3tags->getLength());
        $this->assertEquals('Variable', $mp3tags->getBitrate());
        $this->assertEquals($this->filePath, $mp3tags->getFilePath());
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testFailCommand()
    {
        $this->filePath =  __DIR__ . '/../testFiles/ZOE.LEELA_-_Pop_Up.mp3';
        $mp3tags = new PhpMp3Info($this->createProcessBuilderMock(false));
        $mp3tags->extractId3Tags($this->filePath);
    }

    /**
     * @expectedException \Exception
     */
    public function testFailFile()
    {
        $this->filePath =  'thisFileDoesNotExist.mp3';
        $this->mp3info = new PhpMp3Info();
        $this->mp3info->extractId3Tags($this->filePath);
    }

}
 
