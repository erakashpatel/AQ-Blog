<?php


namespace AQ_Blog\Util;


class DateHelper
{

    public static function getSymbolicDate($timeStamp)
    {
        $str_time = date("Y-m-d H:i:sP", strtotime($timeStamp));
        $time = strtotime($str_time);

        try {
            $d = new \DateTime($str_time);
        } catch (\Exception $e) {
        }

        $weekDays = ['Mon', 'Tue', 'Wed', 'Thur', 'Fri', 'Sat', 'Sun'];
        $months = ['Jan', 'Feb', 'Mar', 'Apr', ' May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'];

        if ($time > strtotime('-2 minutes')) {
            return 'Just now';
        } elseif ($time > strtotime('-59 minutes')) {
            $min_diff = floor((strtotime('now') - $time) / 60);
            return $min_diff . ' min' . (($min_diff != 1) ? "s" : "") . ' ago';
        } elseif ($time > strtotime('-23 hours')) {
            $hour_diff = floor((strtotime('now') - $time) / (60 * 60));
            return $hour_diff . ' hour' . (($hour_diff != 1) ? "s" : "") . ' ago';
        } elseif ($time > strtotime('today')) {
            return $d->format('G:i');
        } elseif ($time > strtotime('yesterday')) {
            return 'Yesterday at ' . $d->format('G:i');
        } elseif ($time > strtotime('this week')) {
            return $weekDays[$d->format('N') - 1] . ' at ' . $d->format('G:i');
        } else {
            return $d->format('j') . ' ' . $months[$d->format('n') - 1] .
                (($d->format('Y') != date("Y")) ? $d->format(' Y') : "") .
                ' at ' . $d->format('G:i');
        }
    }
}
