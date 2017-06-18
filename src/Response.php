<?php namespace Mblox\Mms\Xml;

use Psr\Http\Message\ResponseInterface;

use \SimpleXMLElement;

class Response {

	/**
	 * @var ResponseInterface
	 */
	protected $response;

	/**
	 * Response constructor.
	 *
	 * @param ResponseInterface $response
	 */
	public function __construct(ResponseInterface $response) {
		$this->response = $response;
	}

	/**
	 * Check if the request was successful
	 *
	 * @return bool
	 */
	public function isSuccessful() {
		if ( ! isset($this->response['status']) ) {
			return false;
		}

		return $this->response['status'] === 'Success';
	}

	/**
	 * Check if the request failed
	 *
	 * @return bool
	 */
	public function isFailure() {
		if ( ! isset($this->response['status']) ) {
			return false;
		}

		return $this->response['status'] === 'Failure';
	}

	/**
	 * Convert response to an array
	 *
	 * @return array
	 */
	public function toArray() {
		$xml = new SimpleXMLElement((string)$this->response->getBody());

		return @json_decode(@json_encode($xml),true);
	}

	public function toString() {
		return (string) $this->response->getBody();
	}

}