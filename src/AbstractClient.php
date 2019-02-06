<?php namespace Mblox\Mms\Xml;
use \SimpleXMLElement;


abstract class AbstractClient {

	protected $errors;

	protected $client;

	protected $http;

	/**
	 * @param Client $client
	 */
	public function __construct(Client $client) {
		$this->client = $client;

		$this->http = new Http($client);
	}

	/**
	 * Get common xml elements for all requests
	 *
	 * @return array
	 */
	public function getBaseXml() {
		return [
			'api-key' => $this->client->getApiKey()
		];
	}

	/**
	 * Generate xml from an array of data
	 *
	 * @param array $data
	 *
	 * @return string
	 */
	public function generateXml(array $data) {
		$xml = new SimpleXMLElement('<request/>');
		$this->arrayToXml(array_merge($this->getBaseXml(), $data), $xml);

		return $xml->asXML();
	}

	/**
	 * Convert an array into an xml string
	 *
	 * @param $data
	 * @param $xml_data
	 */
	public function arrayToXml($data, &$xml_data) {
		foreach( $data as $key => $value ) {
			if( is_numeric($key) ) {
				$key = 'item'.$key; //dealing with <0/>..<n/> issues
			}

			if( is_array($value) ) {
				if ($key == 'slide') {
					foreach($value as $slide) {
						$subnode = $xml_data->addChild($key);
						$this->arrayToXml($slide->toArray(), $subnode);
					}
				}
				else {
					$subnode = $xml_data->addChild($key);
					$this->arrayToXml($value, $subnode);
				}
			}
			else {
				$xml_data->addChild("$key",htmlspecialchars("$value"));
			}
		}
	}

	/**
	 * @param array $data
	 *
	 * @return Response
	 */
	public function sendRequest(array $data) {
		return $this->http->send($this->generateXml($data));
	}

}