<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'company_id' => 'required | max:255',
            // 'img_path' => 'image',
            'product_name' => 'required | max:25',
            'maker' => 'required | max:20',
            'price' => 'required | max:20',
            'stock' => 'required | max:20',
            'comment' => 'max:10000',
            
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
            'company_id' => '企業ID',
            //'img_path' => '商品画像',
            'product_name' => '商品名',
            'maker' => 'メーカー',
            'price' => '価格',
            'stock' => '在庫数',
            'comment' => 'コメント',
        ];
    }

    /**
     * エラーメッセージ
     *
     * @return array
     */
    public function messages() {
        return [
            'company_id.required' => ':attributeは必須項目です。',
            'company_id.max' => ':attributeは:max字以内で入力してください。',
            'product_name.required' => ':attributeは必須項目です。',
            'product_name.max' => ':attributeは:max字以内で入力してください。',
            'maker.required' => ':attributeは必須項目です。',
            'maker.max' => ':attributeは:max字以内で入力してください。',
            'price.required' => ':attributeは必須項目です。',
            'price.max' => ':attributeは:max字以内で入力してください。',
            'stock.required' => ':attributeは必須項目です。',
            'stock.max' => ':attributeは:max字以内で入力してください。',
            'comment.max' => ':attributeは:max字以内で入力してください。',
        ];
    }
}
