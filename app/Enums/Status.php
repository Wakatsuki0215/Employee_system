<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class Status extends Enum
{
    const Enabled = 'enabled';
    const Disabled = 'disabled';

    public static function getStatus($value): string
    {
        switch ($value) {
            case self::Enabled:
                return '有効';
            case self::Disabled:
                return '無効';
            default:
                return '';
        }
    }


    public static function getRStatus(bool $isEmpty = true): array
    {
        $Status = [
            self::Enabled => self::getStatus(self::Enabled),
            self::Disabled => self::getStatus(self::Disabled),
        ];
        return $isEmpty ? array_merge([0 => ''], $Status) : $Status;
    }
}