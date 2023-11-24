<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class Affiliation extends Enum
{
    const SystemBusinessDivision = 1;
    const BS = 2;
    const CS = 3;
    const SalesDepartment = 4;
    const GeneralAffairsDepartment = 5;
    const BusinessHeadquarters = 6;

    // 以下、日本語のラベルを追加する
    public static function getDescription($value): string
    {
        switch ($value) {
            case self::SystemBusinessDivision:
                return 'システム事業部';
            case self::BS:
                return 'BS';
            case self::CS:
                return 'CS';
            case self::SalesDepartment:
                return '営業部';
            case self::GeneralAffairsDepartment:
                return '総務部';
            case self::BusinessHeadquarters:
                return '業務本部';
            default:
                return parent::getDescription($value);
        }
    }
}
