<?php
use Tools\Tools;

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
    $capacityPassenger = $app['build.capacity']->findPassengerByBoat($crossing->getBoat()->getId());
    $capacityVehicle = $app['build.capacity']->findVehicleLightByBoat($crossing->getBoat()->getId());
    return $app['twig']->render(
        'crossing/crossing_id.html.twig', array('user' => $app['session']->get('currentUser'), 'crossing' => $crossing, 'passenger' => $capacityPassenger, 'vehicle' => $capacityVehicle)
    );
});

$app->post('/search_crossing', function() use ($app)
{
    if('unselected' == $_POST['link'])
    {
        //$crossings = $app['build.crossing']->findByDateTime(Tools::dateFRToUS($_POST['date']), $_POST['hour']);
        $app['session']->set('error', 401);
    }
    elseif(empty($_POST['date']) || empty($_POST['hour']))
    {
        $app['session']->set('error', 402);
    }
    elseif(10 != strlen($_POST['date']) || substr($_POST['date'],2,1) != '/')
    {
        $app['session']->set('error', 403);
    }
    else
    {
        $crossings = $app['build.crossing']->findByDateTimeLink(Tools::dateFRToUS($_POST['date']), $_POST['hour'], $_POST['link']);
        return $app['twig']->render(
            'crossing/crossing.html.twig', array('user' => $app['session']->get('currentUser'), 'crossings' => $crossings)
        );
    }
    return $app->redirect('.');
});