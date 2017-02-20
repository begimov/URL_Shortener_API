<?php

use Slim\App;

require '../vendor/autoload.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;
$config['baseUrl'] = 'http://localhost:8000';

$app = new App(["settings" => $config]);

require 'database.php';
require 'routes.php';
