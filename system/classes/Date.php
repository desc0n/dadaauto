<?php defined('SYSPATH') OR die('No direct script access.');

class Date extends Kohana_Date
{
    /**
     * @param string $date
     * @param string $format
     * 
     * @return bool|string
     */
    public static function convertDateToFormat($date = '00.00.0000', $format = 'Y-m-d H:i:s')
    {
        return date($format, strtotime($date));
    }
    
}
