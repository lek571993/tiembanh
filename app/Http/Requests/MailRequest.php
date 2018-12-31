<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MailRequest extends FormRequest
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
            'txtName'=>'required',
            'txtEmail'=>'required|email',
            'txtSubject'=>'required',
            'txtMessage'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'txtName.required'=>'Vui lòng nhập vào tên của bạn',
            'txtEmail.email'=>'Email chưa đúng định dạng',
            'txtEmail.required'=>'Vui lòng nhập vào email',
            'txtSubject.required'=>'Vui lòng nhập vào chủ đề',
            'txtMessage.required'=>'Vui lòng nhập vào tin nhắn'
        ];
    }
}
