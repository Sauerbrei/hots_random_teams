<?php
/**
 * Created by PhpStorm.
 * User: PaarBreakdowns
 * Date: 18.04.2017
 * Time: 14:14
 */
session_start();
$beginn = microtime(true);




require_once 'inc/functions.inc.php';
require_once 'config/default_config.php';


$action = $_GET['action'] ?? 'index';
$controller = $_GET['controller'] ?? 'index';

$route = new \Controller\Router($controller, $action, $config['base_dir'], $db, $smarty);



$dauer = round(microtime(true) - $beginn,5);
echo "<font size=2>Verarbeitung des Skripts: $dauer Sek.</font>";