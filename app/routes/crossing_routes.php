<?php

$app->get('/crossing', function() use ($app)
{
    $crossings = $app['build.crossing']->findAll();
    return $app['twig']->render(
        'crossing/crossing.html.twig', array('user' => $app['session']->get('currentUser'), 'crossings' => $crossings)
    );
});