<?php

use Illuminate\Database\Capsule\Manager;

$manager = new Manager;

$manager->addConnection([
  'driver' => 'mysql',
  'host' => '127.0.0.1',
  'database' => 'urlshortener',
  'username' => 'aideus',
  'password' => 'xyzAxyz',
  'charset' => 'utf8',
  'collation' => 'utf8_general_ci',
  'prefix' => ''
]);

$manager->bootEloquent();
