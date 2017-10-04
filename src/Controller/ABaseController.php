<?php

/**
 * Created by PhpStorm.
 * User: PaarBreakdowns
 * Date: 20.04.2017
 * Time: 15:26
 */


namespace Controller;

use Smarty;

abstract class ABaseController {
	/**
	 * @var string
	 */
	protected $basepath = '';
	/**
	 * @var array
	 */
	protected $context = [];
	/**
	 * @var
	 */
	protected $db;
	/**
	 * @var string
	 */
	protected $template = '';
	/**
	 * @var \Smarty
	 */
	protected $templateengine;

	/**
	 * ABaseController constructor.
	 * @param $basepath
	 * @param $em
	 */
	public function __construct($basepath, $db, $templateengine) {
		$this->basepath = $basepath;
		$this->db = $db;
		$this->templateengine = ($templateengine ?? new Smarty());
	}

	/**
	 * @param $action
	 */
	public function run($action) {
		$method = $action . 'Action';
		$this->getTemplateengine()->assign('action', $action);
		$this->setTemplate($action);
		if (method_exists($this, $method)) {
			$this->$method();
		}
		$this->render();
	}

	/**
	 * Renders the HTML Page with Header
	 */
	protected function render() {
		$this->getTemplateengine()->assign('basepath', $this->basepath);
		$this->getTemplateengine()->assign('assetpath', $this->basepath . '/assets');
		$this->getTemplateengine()->assign('template', $this->getTemplate());
		$this->getTemplateengine()->display('template.tpl');
	}

	/**
	 * @param $template
	 * @return string
	 */
	protected function setTemplate($template , $controller = null) {
		$reflection = new \ReflectionClass(get_class($this));
		$controller = $controller ?? $reflection->getShortName();
		$controllerFile = $controller . DIRECTORY_SEPARATOR . $template . '.tpl';
		$this->template = $controllerFile;
	}

	/**
	 * @return string
	 */
	protected function getTemplate(): string {
		return $this->template;
	}

	/**
	 * @return string
	 */
	protected function getNameSpace(): string {
		$reflection = new \ReflectionClass($this);
		return $reflection->getNamespaceName();
	}

	/**
	 * @return string
	 */
	protected function getShortName(): string {
		$reflection = new \ReflectionClass($this);
		return $reflection->getShortName();
	}

	/**
	 * @return \Smarty
	 */
	public function getTemplateengine(): \Smarty {
		return $this->templateengine;
	}

	/**
	 * @param \Smarty $templateengine
	 * @return ABaseController
	 */
	public function setTemplateengine(\Smarty $templateengine): ABaseController {
		$this->templateengine = $templateengine;
		return $this;
	}

}
