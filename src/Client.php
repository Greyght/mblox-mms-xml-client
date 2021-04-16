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
		$this->setApiKey($api_key);
		$this->setServiceId( is_null($service_id) ? "{$short_code}mms" : $service_id);
        $this->setShortCode($short_code);
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

		$this->mms = new Mms($this);

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
    public function setServiceId($service_id) {
        $this->service_id = $service_id;

        return $this;
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

		$this->mms = new Mms($this);

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