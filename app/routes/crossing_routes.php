<?php
use Tools\Tools;

$app->get('/crossing', function () use ($app)
{
    $crossings = $app['build.crossing']->findLast();
    return $app['twig']->render(
        'crossing/crossing.html.twig', array('user' => $app['session']->get('currentUser'), 'crossings' => $crossings)
    );
});

$app->get('/crossing/{id}', function ($id) use ($app)
{
    $crossing = $app['build.crossing']->findOne($id);
    $capacityPassenger = $app['build.capacity']->findPassengerByBoat($crossing->getBoat()->getId());
    $capacityVehicle = $app['build.capacity']->findVehicleLightByBoat($crossing->getBoat()->getId());
    $capacityVehicleHeavy = $app['build.capacity']->findVehicleHeavyByBoat($crossing->getBoat()->getId());
    $bookingTypePassenger = $app['build.bookingtype']->sumPassengerBuy($id);
    $bookingTypeVehicle = $app['build.bookingtype']->sumVehicleBuy($id);
    $bookingTypeVehicleHeavy = $app['build.bookingtype']->sumVehicleHeavyBuy($id);
    $passengerAvailable = $capacityPassenger - $bookingTypePassenger;
    $vehicleAvailable = $capacityVehicle - $bookingTypeVehicle;
    $vehicleHeavyAvailable = $capacityVehicleHeavy - $bookingTypeVehicleHeavy;

    if ($passengerAvailable == 0 && $vehicleAvailable == 0 && $vehicleHeavyAvailable == 0)
    {
        $app['session']->set('full', 403);
    }
    else
    {
        $app['session']->set('full', 400);
    }

    return $app['twig']->render(
        'crossing/crossing_id.html.twig',
        array('user' => $app['session']->get('currentUser'), 'crossing' => $crossing, 'passenger' => $capacityPassenger, 'vehicle' => $capacityVehicle,
            'vehicleHeavy' => $capacityVehicleHeavy, 'full' => $app['session']->get('full'), 'passengerAvailable' => $passengerAvailable,
            'vehicleAvailable' => $vehicleAvailable, 'vehicleHeavyAvailable' => $vehicleHeavyAvailable)
    );
});

$app->post('/search_crossing', function () use ($app)
{
    if ('unselected' == $_POST['link'])
    {
        //$crossings = $app['build.crossing']->findByDateTime(Tools::dateFRToUS($_POST['date']), $_POST['hour']);
        $app['session']->set('error', 401);
        return $app->redirect('.');
    }
    elseif (10 != strlen($_POST['date']) || substr($_POST['date'], 2, 1) != '/' || empty($_POST['date']))
    {
        $app['session']->set('error', 402);
        return $app->redirect('.');
    }
    elseif (empty($_POST['hour']))
    {
        $crossings = $app['build.crossing']->findByDateLink(Tools::dateFRToUS($_POST['date']), $_POST['link']);
    }
    else
    {
        $crossings = $app['build.crossing']->findByDateTimeLink(Tools::dateFRToUS($_POST['date']), $_POST['hour'], $_POST['link']);
    }
    return $app['twig']->render(
        'crossing/crossing.html.twig', array('user' => $app['session']->get('currentUser'), 'crossings' => $crossings)
    );
});