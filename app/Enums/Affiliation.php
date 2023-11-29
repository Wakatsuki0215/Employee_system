<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

use function PHPUnit\Framework\isEmpty;

final class Affiliation extends Enum
{
    const SystemBusinessDivision = 1;
    const BusinessSolution = 2;
    const CrossMediaSolution = 3;
    const SalesDepartment = 4;
    const GeneralAffairsDepartment = 5;
    const BusinessHeadquarters = 6;

    // 以下、日本語のラベルを追加する
    public static function getDescription($value): string
    {
        switch ($value) {
            case self::SystemBusinessDivision:
                return 'システム事業部';
            case self::BusinessSolution:
                return 'BS';
            case self::CrossMediaSolution:
                return 'CS';
            case self::SalesDepartment:
                return '営業部';
            case self::GeneralAffairsDepartment:
                return '総務部';
            case self::BusinessHeadquarters:
                return '業務本部';
            default:
                return '';
        }
    }

    public static function getAffiliations(bool $isEmpty = true) :array
    {
        $affiliations =  [
            //システム事業部
            self::SystemBusinessDivision =>  self::getDescription(self::SystemBusinessDivision),
            //BS
            self::BusinessSolution =>  self::getDescription(self::BusinessSolution),
            //CS
            self::CrossMediaSolution =>  self::getDescription(self::CrossMediaSolution),
            //営業部
            self::SalesDepartment =>  self::getDescription(self::SalesDepartment),
            //総務部
            self::GeneralAffairsDepartment =>  self::getDescription(self::GeneralAffairsDepartment),
            //業務本部
            self::BusinessHeadquarters=>  self::getDescription(self::BusinessHeadquarters),
        ];
        return $isEmpty ? array_merge([0 => ''], $affiliations) : $affiliations;
    }

    // public static function findAffiliation(array $affiliations, int $id) :string
    // {
    //     return collect($affiliations)->affiliation_name ?? ''
    // }
}
