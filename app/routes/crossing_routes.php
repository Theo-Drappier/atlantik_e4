<?php

$app->get('/crossing', function() use ($app)
{
    $crossings = $app['build.crossing']->findLast();
    return $app['twig']->render(
        'crossing/crossing.html.twig', array('user' => $app['session']->get('currentUser'), 'crossings' => $crossings)
    );
});

$app->get('/crossing/{id}', function($id) use ($app)
{
    $crossing = $app['build.crossing']->findOne($id);
    return $app['twig']->render(
        'crossing/crossing_id.html.twig', array('user' => $app['session']->get('currentUser'), 'crossing' => $crossing)
    );
});