#Php-Mp3Info

[![Build Status](https://travis-ci.org/mhor/php-mp3info.png?branch=master)](https://travis-ci.org/mhor/php-mp3info) [![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/mhor/php-mp3info/badges/quality-score.png?s=65b90ebfddc1413f03df05080863a8b20266e0e3)](https://scrutinizer-ci.com/g/mhor/php-mp3info/) [![Code Coverage](https://scrutinizer-ci.com/g/mhor/php-mp3info/badges/coverage.png?s=8eac465f182129a534d4c87b021f69d5720f1e3e)](https://scrutinizer-ci.com/g/mhor/php-mp3info/) [![Latest Stable Version](https://poser.pugx.org/mhor/php-mp3info/v/stable.png)](https://packagist.org/packages/mhor/php-mp3info) [![Total Downloads](https://poser.pugx.org/mhor/php-mp3info/downloads.png)](https://packagist.org/packages/mhor/php-mp3info) [![Latest Unstable Version](https://poser.pugx.org/mhor/php-mp3info/v/unstable.png)](https://packagist.org/packages/mhor/php-mp3info) [![License](https://poser.pugx.org/mhor/php-mp3info/license.png)](https://packagist.org/packages/mhor/php-mp3info) [![Dependencies Status](https://depending.in/mhor/php-mp3info.png)](http://depending.in/mhor/php-mp3info)
## Introduction
PHP class to read ID3 tags with mp3info command

## Installation

You should install [mp3info](http://manpages.ubuntu.com/manpages/gutsy/man1/mp3info.1.html):

On linux:
```bash
$ sudo apt-get install mp3info
```

On Mac:
```bash
$ brew install mp3info
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
$mp3Info = new PhpMp3Info();
$mp3Tags = $mp3info->extractId3Tags('music.mp3');
echo $mp3Tags->getAlbum();
echo $mp3Tags->getTitle();
echo $mp3Tags->getArtist();
echo $mp3Tags->getTrack();
echo $mp3Tags->getBitrate();
echo $mp3Tags->getLength();
//...
```

##LICENSE
See `LICENSE` for more information



