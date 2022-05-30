<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'company_name' => 'required | max:255',
            'street_address' => 'required | max:255',
            'representative_name' => 'required | max:255',
            
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
            'company_name' => '企業名',
            'street_address' => '所在地',
            'representative_name' => '代表責任者',
        ];
    }
    /**
     * エラーメッセージ
     *
     * @return array
     */
    public function messages() {
        return [
            'company_name.required' => ':attributeは必須項目です。',
            'company_name.max' => ':attributeは:max字以内で入力してください。',
            'street_address.required' => ':attributeは必須項目です。',
            'street_address.max' => ':attributeは:max字以内で入力してください。',
            'representative_name.required' => ':attributeはURL形式で入力してください。',
            'representative_name.max' => ':attributeは:max字以内で入力してください。',
        ];
}






}
