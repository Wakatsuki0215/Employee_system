<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * 権限 Enum
 */
final class Role extends Enum
{
    const Admin = 'admin';
    const General = 'general';

    /**
     * 権限取得
     */
    public static function getRole($value): string
    {
        switch ($value) {
            case self::Admin:
                return '管理者';
            case self::General:
                return '一般';
            default:
                return '';
        }
    }

    /**
     * 権限リスト取得
     */
    public static function getRoles(bool $isEmpty = true): array
    {
        $roles = [
            self::Admin => self::getRole(self::Admin),
            self::General => self::getRole(self::General),
        ];

        return $isEmpty ? array_merge([0 => ''], $roles) : $roles;
    }
}
