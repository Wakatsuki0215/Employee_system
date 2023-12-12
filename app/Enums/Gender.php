<?php

declare(strict_types=1);

namespace App\Enums;


use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class Gender extends Enum
{
    const Male = 'male';
    const Female = 'female';

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

    public static function getGenders(bool $isEmpty = true): array
    {
        $genders = [
            self::Male => self::getGender(self::Male),
            self::Female => self::getGender(self::Female),
        ];
        return $isEmpty ? array_merge(['' => ''], $genders) : $genders;
    }
}
