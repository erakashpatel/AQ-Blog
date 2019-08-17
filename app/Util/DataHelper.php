<?php


namespace AQ_Blog\Util;


use AQ_Blog\User;

class DataHelper
{

    public static function updateLastActivity(User $user): void
    {
        $user->last_activity = date('Y-m-d H:i:s');
        $user->save();
    }
}
