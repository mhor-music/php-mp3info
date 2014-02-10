#Php-Mp3Info

## Introduction
PHP class to read ID3 tags with mp3info command

## Installation

You should install [mp3info](http://manpages.ubuntu.com/manpages/gutsy/man1/mp3info.1.html):
On linux:
```bash
$ sudo apt-get install mp3info
```

To use this class install it through [Composer](https://getcomposer.org/), add:
```json
{
    "require" : {
        "mhor/php-mp3info": "0.1"
    }
}
```

## How to use
```php
<?php
//...
use Mhor\PhpMp3Info\PhpMp3Info;
//...
$mp3Tags = new PhpMp3Info();
echo $mp3Tags->extractId3Tags();
echo $mp3Tags->getAlbum();
echo $mp3Tags->getTitle();
echo $mp3Tags->getArtist();
echo $mp3Tags->getTrack();
//...
```

##LICENSE
See `LICENSE` for more information



