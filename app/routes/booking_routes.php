<?php

$app->post('/newBooking', function() use ($app)
{
    $nbQuantity = [];

    $nbQuantity[] = (isset($_POST['nbPassengersAdults'])) ? $_POST['nbPassengersAdults'] : 0;
    $nbQuantity[] = (isset($_POST['nbPassengersJuniors'])) ? $_POST['nbPassengersJuniors'] : 0;
    $nbQuantity[] = (isset($_POST['nbPassengersKids'])) ? $_POST['nbPassengersKids'] : 0;

    $nbQuantity[] = (isset($_POST['nbVehicles_4'])) ? $_POST['nbVehicles_4'] : 0;
    $nbQuantity[] = (isset($_POST['nbVehicles_5'])) ? $_POST['nbVehicles_5'] : 0;

    $nbQuantity[] = (isset($_POST['nbVehiclesHeavyFour'])) ? $_POST['nbVehiclesHeavyFour'] : 0;
    $nbQuantity[] = (isset($_POST['nbVehiclesHeavyCamCar'])) ? $_POST['nbVehiclesHeavyCamCar'] : 0;
    $nbQuantity[] = (isset($_POST['nbVehiclesHeavyCamion'])) ? $_POST['nbVehiclesHeavyCamion'] : 0;;

    $crossing_id = $_POST['crossingId'];



    $booking_id = $app['build.booking']->insert($crossing_id, $app['session']->get('currentUser')->getId());

    if($booking_id->message == 'Success')
    {
        $i = 1;
        foreach($nbQuantity as $row)
        {
            if($row != 0)
            {
                $app['build.bookingtype']->insert($row, $booking_id->id, $i);
            }
            $i++;
        }

        return $app->redirect('listBooking');
    }
    else
    {
        return $app->redirect('crossing/'.$crossing_id);
    }
});

$app->get('/listBooking', function() use ($app)
{
    $bookingUser = $app['build.booking']->findAllByUser($app['session']->get('currentUser')->getId());
    $bookingTypeUser = [];
    foreach($bookingUser as $row)
    {
        $bookingTypeUser[] = $app['build.bookingtype']->findAllByBooking($row->getId());
    }
    unset($bookingUser);
    return $app['twig']->render('booking/list_booking.html.twig',
        array('user' => $app['session']->get('currentUser'))
    );
});