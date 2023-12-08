<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PasswordCustom implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $count = 0;
        $countedTypes = [];

        // 4種類中何種類あるかチェック
        for ($i = 0; $i < mb_strlen($value); $i++) {

            // 各チェック内容を処理
            if (preg_match('/[a-z]/', $value[$i]) && !in_array('lowercase', $countedTypes)) {
                $count ++ ;
                $countedTypes[] = 'lowercase';
            }
            if (preg_match('/[A-Z]/', $value[$i]) && !in_array('uppercase', $countedTypes)) {
                $count ++ ;
                $countedTypes[] = 'uppercase';
            }
            if (preg_match('/[0-9]/', $value[$i]) && !in_array('number', $countedTypes)) {
                $count ++ ;
                $countedTypes[] = 'number';
            }
            if (preg_match('/[@#$%+-=]/', $value[$i]) && !in_array('symbol', $countedTypes)) {
                $count ++ ;
                $countedTypes[] = 'symbol';
            }

            // $countが3に達したらループを終了
            if ($count >= 3) {
                break;
            }
        }

        if ($count < 3) {
            $fail('パスワードには次の大文字、英字小文字、数字、記号(@#$%+-=)の中から最低３つ使用してください。');
        }
    }
}
