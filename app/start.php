<?php

use Slim\App;

require '../vendor/autoload.php';

date_default_timezone_set('Europe/Moscow');

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;
$config['baseUrl'] = 'http://localhost:8000/public';

$app = new App(["settings" => $config]);

require 'database.php';
require 'routes.php';
