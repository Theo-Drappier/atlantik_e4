<?php

require_once __DIR__.'/../vendor/autoload.php';
$app = new Silex\Application();
require __DIR__.'/../app/config/dev.php';
require __DIR__.'/../app/app.php';
require __DIR__ . '/../app/routes/users_routes.php';
require __DIR__ . '/../app/routes/crossing_routes.php';
require __DIR__ . '/../app/routes/booking_routes.php';
$app->run();