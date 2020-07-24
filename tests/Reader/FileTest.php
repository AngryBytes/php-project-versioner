<?php

use Naneau\ProjectVersioner\Versioner;
use Naneau\ProjectVersioner\Reader\File as FileReader;

class FileTest extends \PHPUnit\Framework\TestCase
{
    public function testRead()
    {
        $directory = __DIR__ . '/../projects/file';

        $readers = array(new FileReader('VERSION'));

        $versioner = new Versioner($readers);

        self::assertEquals('5.4.3', $versioner->get($directory));
    }
}
