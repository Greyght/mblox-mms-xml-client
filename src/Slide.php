<?php namespace Mblox\Mms\Xml;

class Slide {

	protected $image;

	protected $audio;

	protected $video;

	protected $vcard;

	protected $ical;

	protected $pdf;

	protected $passbook;

	protected $text;

	protected $duration;


	/**
	 * Set slide message text
	 *
	 * @param $text
	 *
	 * @return $this
	 */
	public function setMessageText($text) {
		$this->text = $text;

		return $this;
	}

	/**
	 * Get slide message text
	 *
	 * @return string
	 */
	public function getMessageText() {
		return $this->text;
	}


	/**
	 * Set slide duration
	 *
	 * @param $duration
	 *
	 * @return $this
	 */
	public function setDuration($duration) {
		$this->duration = $duration;

		return $this;
	}

	/**
	 * Get slide duration
	 *
	 * @return int
	 */
	public function getDuration() {
		return $this->duration;
	}

	/**
	 * Set slide image
	 *
	 * @param $url
	 *
	 * @return $this
	 */
	public function setImage($url) {
		$this->image = $url;

		return $this;
	}

	/**
	 * Get slide image
	 *
	 * @return string
	 */
	public function getImage() {
		return $this->image;
	}

	/**
	 * Set audio url
	 *
	 * @param $url
	 *
	 * @return $this
	 */
	public function setAudio($url) {
		$this->audio = $url;

		return $this;
	}

	/**
	 * Get audio url
	 *
	 * @return string
	 */
	public function getAudio() {
		return $this->audio;
	}

	/**
	 * Set video url
	 *
	 * @param $url
	 *
	 * @return $this
	 */
	public function setVideo($url) {
		$this->video = $url;

		return $this;
	}

	/**
	 * Get video url
	 *
	 * @return string
	 */
	public function getVideo() {
		return $this->video;
	}

	/**
	 * Set vcard url
	 *
	 * @param $url
	 *
	 * @return $this
	 */
	public function setVcard($url) {
		$this->vcard = $url;

		return $this;
	}

	/**
	 * Get vcard url
	 *
	 * @return string
	 */
	public function getVcard() {
		return $this->vcard;
	}

	/**
	 * Set ical url
	 *
	 * @param $url
	 *
	 * @return $this
	 */
	public function setIcal($url) {
		$this->ical = $url;

		return $this;
	}

	/**
	 * Get ical url
	 *
	 * @return string
	 */
	public function getIcal() {
		return $this->ical;
	}

	/**
	 * Set pdf url
	 *
	 * @param $url
	 *
	 * @return $this
	 */
	public function setPdf($url) {
		$this->pdf = $url;

		return $this;
	}

	/**
	 * Get pdf url
	 *
	 * @return string
	 */
	public function getPdf() {
		return $this->pdf;
	}

	/**
	 * Set passbook url
	 *
	 * @param $url
	 *
	 * @return $this
	 */
	public function setPassbook($url) {
		$this->passbook = $url;

		return $this;
	}

	/**
	 * Get passbook url
	 *
	 * @return string
	 */
	public function getPassbook() {
		return $this->passbook;
	}


	/**
	 * Return slide as an array
	 *
	 * @return array
	 */
	public function toArray() {
		$slide = [];

		if ( strlen($this->text) > 0 ) {
			$slide['message-text'] = $this->text;
		}

		if ( ! is_null($this->duration) ) {
			$slide['duration'] = $this->duration;
		}

		if ( ! is_null($this->image) ) {
			$slide['image'] = ['url' => $this->image];
		}

		if ( ! is_null($this->audio) ) {
			$slide['audio'] = ['url' => $this->audio];
		}

		if ( ! is_null($this->video) ) {
			$slide['video'] = ['url' => $this->video];
		}

		if ( ! is_null($this->vcard) ) {
			$slide['vcard'] = ['url' => $this->vcard];
		}

		if ( ! is_null($this->ical) ) {
			$slide['ical'] = ['url' => $this->ical];
		}

		if ( ! is_null($this->pdf) ) {
			$slide['pdf'] = ['url' => $this->pdf];
		}

		if ( ! is_null($this->passbook) ) {
			$slide['passbook'] = ['url' => $this->passbook];
		}

		return $slide;
	}

}