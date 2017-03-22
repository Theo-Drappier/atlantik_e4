<?php

$app->post('/newBooking', function() use ($app)
{
    $nbPassenger = $_POST['nbPassengers'];
    $nbVehicles = $_POST['nbVehicles'];
    $nbVehiclesHeavy = $_POST['nbVehiclesHeavy'];
    $crossing_id = $_POST['crossing_id'];

    return $app['twig']->render('booking/new_booking.html.twig', array('crossing_id' => $crossing_id));
});