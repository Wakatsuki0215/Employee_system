<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\PasswordCustom;

class PasswordRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
			//パスワード：必須、パスワード確認、下限8～上限12文字、 大文字、小文字、数字、記号(４種類中 ３種類 必須)
			'password' =>
            ['required', 'confirmed', 'between:8,100', new PasswordCustom ],
            ];
    }
}
