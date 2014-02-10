<?php

namespace PhpMp3InfoTest;

use Mhor\PhpMp3Info\PhpMp3Info;

class PhpMp3InfoTest extends \PHPUnit_Framework_TestCase {

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
        $this->filePath =  __DIR__ . '/../testFiles/ZOE.LEELA_-_Pop_Up.mp3';
        $this->mp3tags = new PhpMp3Info();
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
        $this->filePath =  __DIR__ . '/../testFiles/ZOE.LEELA_-_Pop_Up.mp3';
        $this->mp3tags = new PhpMp3Info();
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
 