<?php

use Tools\Tools;

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


    $compt = 0;
    foreach($nbQuantity as $row)
    {
        if($row != 0)
        {
            $compt++;
        }
    }

    if($compt != 0)
    {
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
    }
    else
    {
        return $app->redirect('crossing/'.$crossing_id);
    }
});

$app->get('/listBooking', function() use ($app)
{
    $bookingsUser = $app['build.booking']->findAllByUser($app['session']->get('currentUser')->getId());
    return $app['twig']->render('booking/list_booking.html.twig',
        array('user' => $app['session']->get('currentUser'), 'bookings' => $bookingsUser)
    );
});

$app->get('/booking/{id}', function($id) use ($app)
{
    $app['session']->set('error', 0);
    $bookingUser = $app['build.booking']->findOne($id);
    if($bookingUser->getUser()->getId() == $app['session']->get('currentUser')->getId())
    {
        $bookingTypeUser = $app['build.bookingtype']->findAllByBooking($id);

        $link_id = $bookingUser->getCrossing()->getLink()->getId();
        $period = $app['build.period']->findPeriod(Tools::dateFRToUS($bookingUser->getCrossing()->getDate()));

        $somme = 0;
        foreach($bookingTypeUser as $row)
        {
            $type_id = $row->getType()->getId();
            $price = $app['build.price']->findOneByLinkTypePeriod($link_id, $type_id, $period->getId());
            $row->setPrice($price);
            $somme += $row->getQuantity() * $row->getPrice()->getPrice();
        }

        $currDate = date("Y-m-d");
        $currHour = date("H:i:s");

        if(($currDate == Tools::dateFRToUS($bookingUser->getCrossing()->getDate()) && $currHour >= $bookingUser->getCrossing()->getTimeStart()) || $currDate > Tools::dateFRToUS($bookingUser->getCrossing()->getDate()))
        {
            $app['session']->set('error', 404);
        }

        return $app['twig']->render('booking/booking_id.html.twig',
            array('user' => $app['session']->get('currentUser'), 'bookingType' => $bookingTypeUser, 'id' => $id,
                'booking' => $bookingUser, 'somme' => $somme, 'error' => $app['session']->get('error'))
        );
    }
    else
    {
        return $app['twig']->render('others/405.html.twig',
            array('user' => $app['session']->get('currentUser'))
        );
    }

});

$app->post('/deleteBooking', function() use ($app)
{
    $id = $_POST['booking_id'];
    $message = $app['build.bookingtype']->deleteByBooking($id);
    if($message->message == 'Success')
    {
        $app['build.booking']->delete($id);
        return $app->redirect('listBooking');
    }
    else
    {
        return $app->redirect('booking/'.$id);
    }
});