<?php namespace Mblox\Mms\Xml;

class DeviceDiscovery {

	/**
	 * @var string
	 */
	protected $subject;

	/**
	 * @var string
	 */
	protected $text;

	/**
	 * @var int
	 */
	protected $timeout;

	/**
	 * DeviceDiscovery constructor.
	 *
	 * @param $text
	 * @param string $subject
	 * @param int $timeout
	 */
	public function __construct($text, $subject = 'Device Discovery', $timeout = 5) {
		$this->text = $text;

		$this->subject = $subject;

		$this->timeout = $timeout;
	}

	/**
	 * Set message subject
	 *
	 * @param string $subject
	 *
	 * @return $this
	 */
	public function setSubject($subject) {
		$this->subject = $subject;

		return $this;
	}

	/**
	 * Get message subject
	 *
	 * @return string
	 */
	public function getSubject() {
		return $this->subject;
	}

	/**
	 * Set message text
	 *
	 * @param string $text
	 *
	 * @return $this
	 */
	public function setText($text) {
		$this->text = $text;

		return $this;
	}

	/**
	 * Get message text
	 *
	 * @return string
	 */
	public function getText() {
		return $this->text;
	}

	/**
	 * Set message timeout
	 *
	 * @param int $timeout
	 *
	 * @return $this
	 */
	public function setTimeout($timeout) {
		$this->timeout = $timeout;

		return $this;
	}

	/**
	 * Get message timeout
	 *
	 * @return int
	 */
	public function getTimeout() {
		return $this->timeout;
	}

	/**
	 * Convert message to array
	 *
	 * @return array
	 */
	public function toArray() {
		return [
			'ddm-message-subject' => $this->subject,
			'ddm-message-text'    => $this->text,
			'ddm-message-timeout' => $this->timeout
		];
	}
}