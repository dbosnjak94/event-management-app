<?php

require_once 'app/config/config.php';
require_once PROJECT_ROOT . '/autoloader.php';

$controller = new Controller();
$controller->handleRequest();