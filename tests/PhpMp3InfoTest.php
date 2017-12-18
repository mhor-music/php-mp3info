<?php

namespace Mhor\PhpMp3Info\Test;

use Mhor\PhpMp3Info\PhpMp3Info;
use PHPUnit\Framework\TestCase;

class PhpMp3InfoTest extends TestCase {

    /**
     * @var string filePath
     */
    private $filePath = __DIR__ . '/testFiles/ZOE.LEELA_-_Pop_Up.mp3';

    /**
     * @var PhpMp3Info
     */
    protected $mp3info;

    public function testTags()
    {
        $this->mp3info = new PhpMp3Info();
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
        $mp3tags = new PhpMp3Info('this-command-doesnt-exist', 'no arguments');
        $mp3tags->extractId3Tags($this->filePath);
    }

    /**
     * @expectedException \Exception
     */
    public function testFailFile()
    {
        $this->mp3info = new PhpMp3Info();
        $this->mp3info->extractId3Tags('thisFileDoesNotExist.mp3');
    }

}
