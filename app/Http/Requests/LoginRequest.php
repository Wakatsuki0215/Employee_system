<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id' => ['required','integer'], 
             //password 大文字、小文字、数字、記号(４種類中 ３種類 必須)
            'password' => ['required','regex:/^((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])|(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%+-=])|(?=.*[A-Z])(?=.*[0-9])(?=.*[@#$%+-=])|(?=.*[a-z])(?=.*[0-9])(?=.*[@#$%+-=]))([a-zA-Z0-9@#$%+-=]){8,24}$/'],
        ];
    }
}
