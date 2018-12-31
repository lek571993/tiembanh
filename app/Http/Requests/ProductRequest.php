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
            'txtName'       => 'required',
            'txtParentId'   => 'required',
            'txtPrice'      => 'required',
            'fImages'       => 'required'
        ];
    }

    public function messages() {
        return [
            'txtName.required' => 'Vui lòng nhập vào tên sản phẩm',
            'txtParentId.required' => 'Vui lòng chọn loại sản phẩm',
            'txtPrice.required' => 'Vui lòng nhập vào giá sản phẩm',
            'fImages.required' => 'Vui lòng chọn một ảnh',
//            'fImages.image' => 'Ảnh chưa đúng định dạng'
        ];
    }
}
