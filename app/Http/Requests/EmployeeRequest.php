<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use PHPUnit\Framework\ComparisonMethodDoesNotDeclareBoolReturnTypeException;

class EmployeeRequest extends FormRequest
{
public function rules(): array
  {
//     $password=request('password');
//     $password_count = 0;

//     // //何種類あるかcount
//     // for ($password as $key => $value) {

//     // 大文字 ^[A-Z]
//     if($password_count += 1){
//       $password_count += 1;
//     }
//     // // 小文字 ^[a-z]
//     // if(){
//     //   $password_count += 1;
//     // }

//     // // 数字 ^[0-9]
//     // if(){
//     //   $password_count += 1;
//     // }

//     // // 記号 ^[@#$%+-=]
//     // if(){
//     //   $password_count += 1;
//     // }
//     }

//     if ($password_count >= 3) {
//       // 4種類中　3種類以上で認証成功/

//     }else{
//       // 4種類中　2種類以下で認証失敗

    // }



    return[
      /**
       *
       */
      // 名前：必須、上限30文字,日本語（漢字・ひらがな・カタカナのみ）
      'name' =>['required','max:30','regex:/^[ぁ-んァ-ヶ一-龥々]+$/u'],
      // ひらがな：必須、上限30文字、ひらがなのみ
      'kana' =>['required','max:30','regex:/^[あ-ん]+$/u'],
      // 性別：必須
      'gender' =>['required'],
      // 生年月日：必須、上限10文字
      'age' =>['required','max:10'],
      // 郵便番号：必須、数値のみ、上限７文字
      'postcode' =>['required','numeric','digits:7'],
      // 住所：必須、上限150文字
      'address' =>['required','max:150'],
      // 所属：任意
      'affiliation_id' => ['nullable'],
      // メール：必須、email型、上限100文字
      'mail' =>['required', 'email','max:150'],
      // 電話番号：必須、数値のみ、下限10～上限12文字
      'tel' =>['required','numeric','digits_between:10,12'],
      // 管理権限：必須
      'role' =>['required'],
      // ステータス：必須
      'status' =>['required'],
      //パスワード：必須、パスワード確認、下限8～上限12文字、 大文字、小文字、数字、記号(４種類中 ３種類 必須)
      'password' =>$this->isMethod('post') ?['required','confirmed','between:8,100',
      'regex:/^((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])|
              (?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%+-=])|
              (?=.*[A-Z])(?=.*[0-9])(?=.*[@#$%+-=])$/']: [],
    ];

  }
}