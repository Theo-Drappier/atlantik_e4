<?php

use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;


//Register global error and exception handlers PHP
ErrorHandler::register();
ExceptionHandler::register();

//Register service providers
$app->register(new Silex\Provider\TwigServiceProvider(),array('twig.path' => __DIR__.'/../views'));
$app->register(new Silex\Provider\SessionServiceProvider());
