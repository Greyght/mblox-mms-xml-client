<?php namespace Mblox\Mms\Xml;

class Mms extends AbstractClient {

	/**
	 * @param Client $client
	 */
	public function __construct(Client $client) {
		parent::__construct($client);
	}

	/**
	 * Save a MMS message for later use
	 *
	 * @param $name
	 * @param array $slides Array of slide objects
	 * @param string|null $subject
	 *
	 * @return Response
	 */
	public function save($name, array $slides, $subject = null) {
		$data = [
			'action'          => 'saveMMS',
			'name'            => $name,
			'slide'           => $slides,
		];

		if ( ! is_null($subject) ) {
			$data['message-subject'] = $subject;
		}

		return $this->http->send($this->generateXml($data));
	}

	/**
	 * Send a saved mms message
	 *
	 * @param $id
	 * @param $to
	 * @param $fallback_text
	 * @param $custom_text
	 * @param DeviceDiscovery|null $ddm
	 *
	 * @return Response
	 */
	public function sendSaved($id, $to, $fallback_text, $custom_text = null, DeviceDiscovery $ddm = null) {
		$data = [
			'action'            => 'sendSavedMMS',
			'to'                => $to,
			'from'              => $this->client->getShortCode(),
			'service-id'        => $this->client->getServiceId(),
			'mms-id'            => $id,
			'fallback-sms-text' => $fallback_text,
		];

		if ( ! is_null($custom_text) ) {
			$data['custom-text'] = ['slide' => '1', 'value' => $custom_text];
		}

		if ( ! is_null($ddm) ) {
			$data = array_merge($data, $ddm->toArray());
		}

		return $this->http->send($this->generateXml($data));
	}

	/**
	 * Send an mms message
	 *
	 * @param $name
	 * @param $to
	 * @param array $slides Array of slide objects
	 * @param $fallback_text
	 *
	 * @return Response
	 */
	public function send($name, $to, array $slides, $fallback_text) {
		$data = [
			'action'            => 'sendMMS',
			'to'                => $to,
			'from'              => $this->client->getShortCode(),
			'service-id'        => $this->client->getServiceId(),
			'name'              => $name,
			'slide'             => $slides,
			'fallback-sms-text' => $fallback_text,
		];

		return $this->http->send($this->generateXml($data));
	}

	/**
	 * Delete a saved mms message
	 *
	 * @param $id
	 *
	 * @return Response
	 */
	public function delete($id) {
		$data = [
			'action' => 'deleteMMSID',
			'mms-id' => $id,
		];

		return $this->http->send($this->generateXml($data));
	}

	/**
	 * Get mms message templates in descending order by date
	 *
	 * @param null $start_date
	 * @param int $page_number
	 * @param int $per_page
	 *
	 * @return Response
	 */
	public function getTemplates($start_date = null, $page_number = 1, $per_page = 100) {
		$data = [
			'action' => 'getMMSTemplates',
			'page-number' => $page_number,
			'items-per-page' => $per_page,
		];

		if ( ! is_null($start_date) ) {
			$data['start-date'] = $start_date;
		}

		return $this->http->send($this->generateXml($data));
	}

}