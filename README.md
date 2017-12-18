# Php-Mp3Info

[![Build Status](https://travis-ci.org/mhor-music/php-mp3info.svg?branch=master)](https://travis-ci.org/mhor-music/php-mp3info) [![Codacy](https://www.codacy.com/project/badge/9783f65810cf4d71a659f441d7ea4123)](https://www.codacy.com/public/mhor-music/php-mp3info/master/dashboard) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/mhor-music/php-mp3info/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/mhor-music/php-mp3info/?branch=master) [![Code Coverage](https://scrutinizer-ci.com/g/mhor-music/php-mp3info/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/mhor-music/php-mp3info/?branch=master) [![Latest Stable Version](https://poser.pugx.org/mhor/php-mp3info/v/stable.png)](https://packagist.org/packages/mhor/php-mp3info) [![Total Downloads](https://poser.pugx.org/mhor/php-mp3info/downloads.png)](https://packagist.org/packages/mhor/php-mp3info) [![Latest Unstable Version](https://poser.pugx.org/mhor/php-mp3info/v/unstable.png)](https://packagist.org/packages/mhor/php-mp3info) [![License](https://poser.pugx.org/mhor/php-mp3info/license.png)](https://packagist.org/packages/mhor/php-mp3info) [![Dependency Status](https://www.versioneye.com/user/projects/53ac2c0ed043f95c24000021/badge.svg?style=flat)](https://www.versioneye.com/user/projects/53ac2c0ed043f95c24000021) [![PullReview stats](https://www.pullreview.com/github/mhor-music/php-mp3info/badges/master.svg?)](https://www.pullreview.com/github/mhor-music/php-mp3info/reviews/master)

## Introduction

PHP class to read ID3v1 tags with `mp3info` command

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
```bash
$ composer require mhor/php-mp3info
```

## How to use

```php
<?php
//...
use Mhor\PhpMp3Info\PhpMp3Info;
//...
$mp3Info = new PhpMp3Info();
$mp3Tags = $mp3Info->extractId3Tags('music.mp3');
echo $mp3Tags->getAlbum();
echo $mp3Tags->getTitle();
echo $mp3Tags->getArtist();
echo $mp3Tags->getTrack();
echo $mp3Tags->getBitrate();
echo $mp3Tags->getLength();
//...
```

## LICENSE

See `LICENSE` for more information
