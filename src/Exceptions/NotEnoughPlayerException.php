<?php

/**
 * Created by PhpStorm.
 * User: PaarBreakdowns
 * Date: 03.10.2017
 * Time: 16:04
 */

namespace Exceptions;

/**
 * Class NotEnoughPlayerException
 * @package Exceptions
 */
class NotEnoughPlayerException {

	/**
	 * @var string
	 */
	private $message = '';

	/**
	 * NotEnoughPlayerException constructor.
	 */
	public function __construct(string $message) {
		$this->message = $message;
	}

	/**
	 * @return string
	 */
	public function getMessage(): string {
		return $this->message;
	}

	/**
	 * @param string $message
	 * @return NotEnoughPlayerException
	 */
	public function setMessage(string $message): NotEnoughPlayerException {
		$this->message = $message;
		return $this;
	}
}