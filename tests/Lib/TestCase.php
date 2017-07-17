<?php
namespace App\Test\Lib;

use PHPUnit_Framework_TestCase;

if (!defined('DS')) {
    /**
     * Define DS as short form of DIRECTORY_SEPARATOR.
     */
    define('DS', DIRECTORY_SEPARATOR);
}

class TestCase extends PHPUnit_Framework_TestCase
{
    protected $tmpPath = null;

    private $tmpfiles = [];

    public function setUp()
    {
        $this->tmpPath = dirname(dirname(__DIR__)) . DS . 'tmp' . DS;

        parent::setUp();
    }

    public function tearDown()
    {
        parent::tearDown();

        foreach ($this->tmpfiles as $file) {
            unlink($file);
        }
    }

    protected function makeHttpRequest($params, $isJson = false, $type = 'req')
    {
        $buf = $params;
        if ($isJson === true) {
            $buf = json_encode($params);
        } else {
            if (is_array($params)) {
                $buf = http_build_query($params);
            }
        }
        $filename = $this->tmpPath . $type;

        file_put_contents($filename, $buf);
        $this->tmpfiles[] = $filename;
        putenv("{$type}={$filename}");
    }

    protected function makeResponse($type = 'res')
    {
        $filename = $this->tmpPath . $type;
        touch($filename);
        $this->tmpfiles[] = $filename;
        putenv("res={$filename}");
    }

    protected function getResponse($type = 'res')
    {
        $filename = $this->tmpPath . $type;
        return file_get_contents($filename);
    }
}
