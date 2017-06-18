<?php namespace Mblox\Mms\Xml;

class Client {

	/**
	 * @var string
	 */
	protected $api_url = 'https://api.ci.mblox.com/ep/v1/';

	/**
	 * @var string
	 */
	protected $api_key;

	/**
	 * @var int
	 */
	protected $short_code;

	/**
	 * @var string
	 */
	protected $service_id;

	/**
	 * @var Mms
	 */
	protected $mms;

	public function __construct($api_key = null, $short_code = null, $service_id = null) {
		$this->api_key = $api_key;
		$this->short_code = $short_code;
		$this->service_id = $service_id;

		$this->mms = new Mms($this);
	}

	/**
	 * Get the API url
	 *
	 * @return string
	 */
	public function getApiUrl() {
		return $this->api_url;
	}

	/**
	 * Set the API key
	 *
	 * @param $api_key
	 *
	 * @return $this
	 */
	public function setApiKey($api_key) {
		$this->api_key = $api_key;

		return $this;
	}

	/**
	 * Get the API key
	 *
	 * @return null|string
	 */
	public function getApiKey() {
		return $this->api_key;
	}

	/**
	 * Set the short code
	 *
	 * @param $short_code
	 *
	 * @return $this
	 */
	public function setShortCode($short_code) {
		$this->short_code = $short_code;

		return $this;
	}

	/**
	 * Get the short code
	 *
	 * @return null|string
	 */
	public function getShortCode() {
		return $this->short_code;
	}

	/**
	 * Set the API service ID
	 *
	 * @param $service_id
	 *
	 * @return $this
	 */
	public function setServiceId($service_id) {
		$this->service_id = $service_id;

		return $this;
	}

	/**
	 * Get the API service ID
	 *
	 * @return null|string
	 */
	public function getServiceId() {
		return $this->service_id;
	}

	/**
	 * @return Mms
	 */
	public function mms() {
		return $this->mms;
	}

}