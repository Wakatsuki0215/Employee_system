<?php declare(strict_types=1);

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

    // 以下、日本語のラベルを追加する
    public static function getDescription($value): string
    {
        switch ($value) {
            case self::Male:
                return '男性';
            case self::Female:
                return '女性';
            default:
                return parent::getDescription($value);
        }
    }
}
