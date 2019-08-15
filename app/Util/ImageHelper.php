<?php


namespace AQ_Blog\Util;


use AQ_Blog\User;

class ImageHelper
{
    private const STORAGE_DIR = 'storage/';
    private const AVATAR_DIR = self::STORAGE_DIR . 'avatars/';

    private const ONLINE_STATUS = self::STORAGE_DIR . 'online_status.png';
    private const OFFLINE_STATUS = self::STORAGE_DIR . 'offline_status.png';

    public static function getUserAvatar(User $user): string
    {
        return asset(self::AVATAR_DIR . $user->avatar ?? 'default_avatar.jpg');
    }

    public static function getUserStatus(User $user): string
    {
        return asset((self::STORAGE_DIR . $user->online()) ? self::ONLINE_STATUS : self::OFFLINE_STATUS);
    }
}
