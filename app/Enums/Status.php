<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * ステータス
 */
final class Status extends Enum
{
    const Enabled = 'enabled';
    const Disabled = 'disabled';

    /**
     * ステータス取得
     */
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


    /**
     * ステータスリスト取得
     */
    // NOTE: getRStatus→getStatusに変更 
    // TODO: getRStatusで全ファイルで検索し、getStatusesに一斉置換してください。
    public static function getStatuses(bool $isEmpty = true): array
    {
        // NOTE: Status→status
        $status = [
            self::Enabled => self::getStatus(self::Enabled),
            self::Disabled => self::getStatus(self::Disabled),
        ];

        return $isEmpty ? array_merge([0 => ''], $status) : $status;
    }
}
