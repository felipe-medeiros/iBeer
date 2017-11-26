<?php

use Silex\Application;

require __DIR__ . '/../vendor/autoload.php';

require __DIR__ . '/../bootstrap.php';
$app = new Application();
require __DIR__ . '/../config/dev.php';
require __DIR__ . '/../src/controllers.php';
$app->run();