<?php

use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;


//Register global error and exception handlers PHP
ErrorHandler::register();
ExceptionHandler::register();

//Register service providers
$app->register(new Silex\Provider\TwigServiceProvider(),array('twig.path' => __DIR__.'/../views'));
$app->register(new Silex\Provider\SessionServiceProvider());

$app['build.boat']=function()
{
    return \BDD\Build\BoatBuild::getInstances();
};

$app['build.booking']=function($app)
{
    $bookingBuild = \BDD\Build\BookingBuild::getInstances();
    $bookingBuild->setUsersBuild($app['build.users']);
    $bookingBuild->setCrossingBuild($app['build.crossing']);
    return $bookingBuild;
};

$app['build.bookingtype']=function($app)
{
    $bookingtypeBuild = \BDD\Build\BookingTypeBuild::getInstances();
    $bookingtypeBuild->setBookingBuild($app['build.booking']);
    $bookingtypeBuild->setTypeBuild($app['build.type']);
    return $bookingtypeBuild;
};

$app['build.capacity']=function($app)
{
    $capacityBuild = \BDD\Build\CapacityBuild::getInstances();
    $capacityBuild->setCategoryBuild($app['build.category']);
    $capacityBuild->setBoatBuild($app['build.boat']);
    return $capacityBuild;
};

$app['build.category'] = function()
{
    return \BDD\Build\CategoryBuild::getInstances();
};

$app['build.crossing'] = function($app)
{
    $crossingBuild = \BDD\Build\CrossingBuild::getInstances();
    $crossingBuild->setLinkBuild($app['build.link']);
    $crossingBuild->setBoatBuild($app['build.boat']);
    return $crossingBuild;
};

$app['build.harbor'] = function()
{
    return \BDD\Build\HarborBuild::getInstances();
};

$app['build.link'] = function($app)
{
    $linkBuild = \BDD\Build\LinkBuild::getInstances();
    $linkBuild->setHarborBuild($app['build.harbor']);
    $linkBuild->setSectorBuild($app['build.sector']);
    return $linkBuild;
};

$app['build.period'] = function()
{
    return \BDD\Build\PeriodBuild::getInstances();
};

$app['build.price'] = function($app)
{
    $priceBuild = \BDD\Build\PriceBuild::getInstances();
    $priceBuild->setLinkBuild($app['build.link']);
    $priceBuild->setTypeBuild($app['build.type']);
    $priceBuild->setPeriodBuild($app['build.period']);
    return $priceBuild;
};

$app['build.sector'] = function()
{
    return \BDD\Build\SectorBuild::getInstances();
};

$app['build.type'] = function($app)
{
    $typeBuild = \BDD\Build\TypeBuild::getInstances();
    $typeBuild->setCategoryBuild($app['build.category']);
    return $typeBuild;
};

$app['build.users'] = function()
{
    return \BDD\Build\UsersBuild::getInstances();
};