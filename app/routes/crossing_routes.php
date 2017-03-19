<?php

$app->get('/crossing', function() use ($app)
{
    return $app['twig']->render(
        'crossing/crossing.html.twig', array('user' => $app['session']->get('currentUser'))
    );
});