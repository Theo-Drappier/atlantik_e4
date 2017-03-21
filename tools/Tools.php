<?php
/**
 * Created by PhpStorm.
 * User: usersio
 * Date: 20/03/17
 * Time: 16:43
 */

namespace Tools;


class Tools
{
    public static function dateUSToFR($dateUS)
    {
        $date = explode('-', $dateUS);
        $dateFR = $date[2].'/'.$date[1].'/'.$date[0];
        return $dateFR;
    }

    public static function dateFRToUS($dateFR)
    {
        $date = explode('/', $dateFR);
        $dateUS = $date[2].'-'.$date[1].'-'.$date[0];
        return $dateUS;
    }
}