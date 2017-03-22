<?php

$app->post('/newBooking', function() use ($app)
{
    $nbPassenger = null;
    $nbVehicles = null;
    $nbVehiclesHeavy = null;

    if(isset($_POST['nbPassengers']))
    {
        $nbPassenger = $_POST['nbPassengers'];
    }

    if(isset($_POST['nbVehicles']))
    {
        $nbVehicles = $_POST['nbVehicles'];
    }

    if(isset($_POST['nbVehiclesHeavy']))
    {
        $nbVehiclesHeavy = $_POST['nbVehiclesHeavy'];
    }

    $crossing_id = $_POST['crossingId'];

    return $app['twig']->render('booking/new_booking.html.twig', array('user' => $app['session']->get('currentUser'), 'crossing_id' => $crossing_id));
});