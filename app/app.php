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
    return new \BDD\Build\BoatBuild();
};

$app['build.booking']=function($app)
{
    $bookingBuild = new \BDD\Build\BookingBuild();
    $bookingBuild->setUsersBuild($app['build.users']);
    $bookingBuild->setCrossingBuild($app['build.crossing']);
    return $bookingBuild;
};

$app['build.bookingtype']=function($app)
{
    $bookingtypeBuild = new \BDD\Build\BookingTypeBuild();
    $bookingtypeBuild->setBookingBuild($app['build.booking']);
    $bookingtypeBuild->setTypeBuild($app['build.type']);
    return $bookingtypeBuild;
};

$app['build.capacity']=function($app)
{
    $capacityBuild = new \BDD\Build\CapacityBuild();
    $capacityBuild->setCategoryBuild($app['build.category']);
    $capacityBuild->setBoatBuild($app['build.boat']);
    return $capacityBuild;
};

$app['build.category'] = function()
{
    return new \BDD\Build\CategoryBuild();
};

$app['build.crossing'] = function($app)
{
    $crossingBuild = new \BDD\Build\CrossingBuild();
    $crossingBuild->setLinkBuild($app['build.link']);
    $crossingBuild->setBoatBuild($app['build.boat']);
    return $crossingBuild;
};

$app['build.harbor'] = function()
{
    return new \BDD\Build\HarborBuild();
};

$app['build.link'] = function($app)
{
    $linkBuild = new \BDD\Build\LinkBuild();
    $linkBuild->setHarborBuild($app['build.harbor']);
    $linkBuild->setSectorBuild($app['build.sector']);
    return $linkBuild;
};

$app['build.period'] = function()
{
    return new \BDD\Build\PeriodBuild();
};

$app['build.price'] = function($app)
{
    $priceBuild = new \BDD\Build\PriceBuild();
    $priceBuild->setLinkBuild($app['build.link']);
    $priceBuild->setTypeBuild($app['build.type']);
    $priceBuild->setPeriodBuild($app['build.period']);
    return $priceBuild;
};

$app['build.sector'] = function()
{
    return new \BDD\Build\SectorBuild();
};

$app['build.type'] = function($app)
{
    $typeBuild = new \BDD\Build\TypeBuild();
    $typeBuild->setCategoryBuild($app['build.category']);
    return $typeBuild;
};

$app['build.users'] = function()
{
    return new \BDD\Build\UsersBuild();
};