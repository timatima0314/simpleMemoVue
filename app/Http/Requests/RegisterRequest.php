<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => ':attributeは必須です。',
            'email.required' => ':attributeは必須項目です。',
            'email.email' => '無効の:attributeです。',
            'password.required' => ':attributeは必須項目です。',
        ];
    }
    public function attributes()
    {
        return [
            'name' => '名前',
            'email' => 'メールアドレス',
            'password' => 'パスワード'
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        $response['status']  = 400;
        $response['statusText'] = 'Failed validation.';
        $response['errors']  = $validator->errors();
        throw new HttpResponseException(
            response()->json($response, 400)
        );
    }
}
