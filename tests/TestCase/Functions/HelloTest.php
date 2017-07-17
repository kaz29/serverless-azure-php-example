<?php
namespace App\Test\TestCase\Functions;

use App\Test\Lib\TestCase;
use App\Functions\Hello;

class HelloTest extends TestCase
{
    var $hello = null;

    public function setUp()
    {
        parent::setUp();

    }

    public function tearDown()
    {
        unset($this->hello);
        parent::tearDown();
    }

    /**
     * @test
     */
    public function 通常の書き込みのテスト()
    {
        $params = [
            'name' => 'userA',
        ];
        $this->makeHttpRequest($params, true);
        $this->makeResponse();

        $this->hello = new Hello();
        $this->hello->run();

        $result = json_decode($this->getResponse(), true);
        $expected = [
            'body' => 'Hello userA',
        ];
        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function パラメーターエラーのテスト()
    {
        $params = [
        ];
        $this->makeHttpRequest($params, true);
        $this->makeResponse();

        $this->hello = new Hello();
        $this->hello->run();

        $result = json_decode($this->getResponse(), true);
        $expected = [
            "status" => 400,
            "body" => "Please pass a name on the query string or in the request body",
        ];
        $this->assertEquals($expected, $result);
    }
}
