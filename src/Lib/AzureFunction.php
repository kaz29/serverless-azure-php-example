<?php
namespace App\Lib;

abstract class AzureFunction
{
    abstract protected function run();

	protected $request = null;
	protected $response = null;

	public function __construct($req = 'req', $res = 'res')
	{
		$this->init(getenv($req), getenv($res));
	}

	protected function init($request, $response = STDOUT)
	{
		$this->request = file_get_contents($request);
		$this->response = $response;
	}

	protected function writeResponse($contents)
	{
		return file_put_contents($this->response, $contents);
	}

	protected function httpParams()
	{
		$params = null;
		parse_str($this->request, $params);

		return $params;
	}
}
