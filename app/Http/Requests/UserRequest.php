<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_name' => 'required | max:25',
            'email' => 'required | max:255 | email',
            'password' => 'min:16 | max:16',
        ];
    }

    /**
     * 項目名
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'user_name' => 'ユーザ名',
            'email' => 'eメールアドレス',
            'password' => 'パスワード',
        ];
    }

    /**
     * エラーメッセージ
     *
     * @return array
     */
    public function messages() {
        return [
            'user_name.required' => ':attributeは必須項目です。',
            'user_name.max' => ':attributeは:max字以内で入力してください。',
            'email.required' => ':attributeは必須項目です。',
            'email.max' => ':attributeは:max字以内で入力してください。',
            'email.email' => ':attributeはURL形式で入力してください。',
            'password.min' => ':attributeは:min字以上、max字以内で入力してください。',
        ];
    }
}