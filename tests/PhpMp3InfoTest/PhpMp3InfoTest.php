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
    protected $mp3tags;

    public function testTags()
    {
        $mock = $this->getMock('ProcessCommand', array('executeCommand'));

        $mock->expects($this->any())
            ->method('executeCommand')
            ->will($this->returnValue('ZOE LEELA|Pop Up|1|Digital Guilt'));

        $this->filePath =  __DIR__ . '/../testFiles/ZOE.LEELA_-_Pop_Up.mp3';
        $this->mp3tags = new PhpMp3Info($mock);
        $this->mp3tags->extractId3Tags($this->filePath);
        $this->assertEquals('Digital Guilt', $this->mp3tags->getAlbum());
        $this->assertEquals('1', $this->mp3tags->getTrack(), '1');
        $this->assertEquals('Pop Up', $this->mp3tags->getTitle());
        $this->assertEquals('ZOE LEELA', $this->mp3tags->getArtist());
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testFailCommand()
    {
        $mock = $this->getMock('ProcessCommand', array('executeCommand'));

        $mock->expects($this->any())
            ->method('executeCommand')
            ->will($this->throwException(new \RuntimeException()));


        $this->filePath =  __DIR__ . '/../testFiles/ZOE.LEELA_-_Pop_Up.mp3';
        $this->mp3tags = new PhpMp3Info($mock);
        $this->mp3tags->extractId3Tags($this->filePath);
    }

    /**
     * @expectedException \Exception
     */
    public function testFailFile()
    {
        $this->filePath =  'thisFileDoesNotExist.mp3';
        $this->mp3tags = new PhpMp3Info();
        $this->mp3tags->extractId3Tags($this->filePath);
    }

}
 