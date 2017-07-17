<?php
namespace App\Functions;

use App\Lib\AzureFunction;

class Hello extends AzureFunction
{
	public function run()
	{
		$params = json_decode($this->request, true);
		$response = [];
		if (array_key_exists('name', $params)) {
			$response = [
				"body" => "Hello {$params['name']}",
			];
		} else {
			$response = [
				"status" => 400,
				"body" => "Please pass a name on the query string or in the request body",
			];
		}
		$this->writeResponse(json_encode($response));
	}
}