<?php

declare(strict_types=1);

namespace App\Enums;


use BenSampo\Enum\Enum;

/**
 * 性別 Enum
 */
final class Gender extends Enum
{
    const Male = 'male';
    const Female = 'female';

    /**
     * 性別取得
     */
    public static function getGender($value): string
    {
        switch ($value) {
            case self::Male:
                return '男性';
            case self::Female:
                return '女性';
            default:
                return '';
        }
    }

    /**
     * 性別リスト取得
     */
    public static function getGenders(bool $isEmpty = true): array
    {
        $genders = [
            self::Male => self::getGender(self::Male),
            self::Female => self::getGender(self::Female),
        ];

        return $isEmpty ? array_merge(['' => ''], $genders) : $genders;
    }
}
