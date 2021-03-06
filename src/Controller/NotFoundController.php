<?php

namespace Controller;

/**
 * Class NotFoundController
 * @package Controller
 */
class NotFoundController extends ABaseController {

	/**
	 * @var null|string
	 */
	protected $errorMsg = '';

	/**
	 * NotFoundController constructor.
	 * @param null $errorMsg
	 */
	public function __construct( $errorMsg = NULL ) {
		parent::__construct(null, null, null);
		$this->errorMsg = $errorMsg;
	}

	/**
	 * @return null|string
	 */
	public function getErrorMsg() {
		return $this->errorMsg;
	}

	/**
	 * @param null|string $errorMsg
	 * @return NotFoundController
	 */
	public function setErrorMsg($errorMsg) {
		$this->errorMsg = $errorMsg;
		return $this;
	}

	/**
	 *
	 */
	protected function IndexAction() {
		$this->setErrorMsg('Controller not found');
		$this->getTemplateengine()->assign('error', $this->getErrorMsg());
	}

	/**
	 *
	 */
	protected function ActionNotFoundAction() {
		$this->setErrorMsg('Action not found');
		$this->getTemplateengine()->assign('error', $this->getErrorMsg());
	}

	/**
	 *
	 */
	protected function IdNotFoundAction() {
		$this->setErrorMsg('ID not found');
		$this->getTemplateengine()->assign('error', $this->getErrorMsg());
	}
}