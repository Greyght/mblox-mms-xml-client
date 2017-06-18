<?php namespace Mblox\Mms\Xml;

use GuzzleHttp\Client as HttpClient;

class Http {

	protected $client;

	protected $http;

	/**
	 * @param Client $client
	 */
	public function __construct(Client $client) {
		$this->client = $client;

		$this->http = new HttpClient(['http_errors' => false]);
	}

	/**
	 * Send an xml request to the API
	 *
	 * @param $xml
	 *
	 * @return Response
	 */
	public function send($xml) {
		$response = $this->http->post(
			$this->client->getApiUrl(),
			['body' => $xml]
		);

		return new Response($response);
	}

}