<?php
/**
 * Created by PhpStorm.
 * User: PaarBreakdowns
 * Date: 03.10.2017
 * Time: 15:05
 */

require_once 'default_config.php';

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($db);