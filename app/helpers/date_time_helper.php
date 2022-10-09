<?php

namespace App\Helpers;

use DateTime;

class DateTimeHelper
{
    static public function isNotExpired(DateTime $datetime): bool
    {
        date_default_timezone_set('Asia/Dhaka');

        if ($datetime > new DateTime('now')) {
            return true;
        } else {
            return false;
        }
    }
}