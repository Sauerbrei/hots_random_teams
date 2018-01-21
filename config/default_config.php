<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$config             = [];
$config['base_dir'] = dirname(__DIR__);


/**
 * AddOns
 */
$loader = require $config['base_dir'] . "/vendor/autoload.php";
// Smarty (Template Engine)
require_once($config['base_dir'] . '/vendor/smarty/smarty/libs/Autoloader.php');
Smarty_Autoloader::register();

$smarty = new Smarty();
$dotenv = new \Dotenv\Dotenv($config['base_dir']);
$dotenv->load();

/**
 * DATABASE CONNECTIONS
 */

/*
 * MySQL
 */
$config['db'] = [
	'driver'   => getenv('DB_DRIVER'),
	'host'     => getenv('DB_HOST'),
	'user'     => getenv('DB_USER'),
	'password' => getenv('DB_PASS'),
	'dbname'   => getenv('DB_DATABASE'),
	'port'     => getenv('DB_PORT'),
	'charset'  => getenv('DB_CHARSET'),
];

$dbOptions = [
	'paths'   => [
		$config['base_dir'] . '/src/Entities',
	],
	'devMode' => true,
];

$dbConf = Setup::createAnnotationMetadataConfiguration(
	$dbOptions['paths'],
	$dbOptions['devMode'],
	null,
	null,
	false
);

$db = EntityManager::create($config['db'], $dbConf);


