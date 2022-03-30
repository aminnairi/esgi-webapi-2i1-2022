<?php

class Number
{
    public static function between($minimum, $maximum, $number)
    {
        if ($number > $maximum) {
            return false;
        }

        if ($number < $minimum) {
            return false;
        }

        return true;
    }
}
