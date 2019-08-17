<?php


namespace AQ_Blog\Util;


use AQ_Blog\Role;
use AQ_Blog\User;
use Illuminate\Support\Str;

class ImageHelper
{
    private const STORAGE_DIR = 'storage/';
    private const AVATAR_DIR = self::STORAGE_DIR . 'avatars/';
    private const BADGE_DIR = self::STORAGE_DIR . 'badges/';

    private const ONLINE_STATUS = self::STORAGE_DIR . 'online_status.png';
    private const OFFLINE_STATUS = self::STORAGE_DIR . 'offline_status.png';

    public static function getUserAvatar(User $user): string
    {
        return asset(self::AVATAR_DIR . $user->avatar ?? 'default_avatar.jpg');
    }

    public static function getUserStatus(User $user): string
    {
        return asset(($user->online() ? self::ONLINE_STATUS : self::OFFLINE_STATUS));
    }

    public static function getRoleBadge(Role $role): string
    {
        $badge = $role->badge;

        if (Str::startsWith($badge, '#')) {
            return $badge; // Hex color code.
        }

        $url = asset(self::BADGE_DIR . $role->badge);

        if (isset($url) && !empty($url) && file_exists(self::BADGE_DIR . $role->badge)) {
            return $url; // Badge image.
        }

        return Role::DEFAULT_BADGE_COLOR; // If not exists, fallback to default.
    }
}
