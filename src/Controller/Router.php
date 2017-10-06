<?php

namespace Controller;

/**
 * Class Router
 * @package Controller
 */
class Router {
	/**
	 * Router constructor.
	 * @param $controller
	 * @param $action
	 * @param $base_dir
	 * @param $db
	 * @return ABaseController
	 */
	public function __construct($controller, $action, $base_dir, $db, $smarty) {
		$controllerNamespace = 'Controller\\';
		$controllerFound = false;

		$doController = $controllerNamespace . 'NotFoundController';
		$doAction = 'index';

		$controllerName = $controllerNamespace . ucfirst($controller) . 'Controller';
		$actionName = ucfirst($action) . 'Action';

		if (class_exists($controllerName)) {
			/** @var $requestController ABaseController */
			$doController = $controllerName;
			$controllerFound = true;
		}
		$myController = new $doController($base_dir, $db, $smarty);

		if ($controllerFound && method_exists($myController, $actionName)) {
			$doAction = $action;
		} elseif ($controllerFound) {
			$doController = $controllerNamespace . 'NotFoundController';
			$myController = new $doController();
			$doAction = 'actionNotFound';
		}
		$myController->run($doAction);
	}
}