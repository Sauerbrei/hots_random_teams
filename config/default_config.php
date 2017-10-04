<?php
/**
 * Created by PhpStorm.
 * User: PaarBreakdowns
 * Date: 06.05.2017
 * Time: 10:14
 */

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;


$config = [];

$config['base_dir'] = dirname(__DIR__);


/**
 * AddOns
 */
$loader = require $config['base_dir'] . "/vendor/autoload.php";
// Smarty (Template Engine)
require_once($config['base_dir'] . '/vendor/smarty/smarty/libs/Autoloader.php');
Smarty_Autoloader::register();
$smarty = new Smarty();

/**
 * DATABASE CONNECTIONS
 */

/*
 * MySQL
 */
$config['db']['mysql'] = [
	'driver'	=> 'pdo_mysql',
	'host'		=> 'localhost',
	'user'		=> 'htdocs_test',
	'password'	=> '123test456!',
	'dbname'	=> 'test',
	'port'		=> 3306,
	'charset'	=> 'utf8',
];
$usedDB = $config['db']['mysql'];
$dbOptions = [
	'paths' 	=> [
		__DIR__ . '/../src/Entities',
	],
	'devMode' 	=> true,
];
$dbConf = Setup::createAnnotationMetadataConfiguration($dbOptions['paths'], $dbOptions['devMode'], null, null, false);
$db = EntityManager::create($usedDB, $dbConf);


