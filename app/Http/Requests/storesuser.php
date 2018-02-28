<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storesuser extends FormRequest
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
            'name' => 'required',
            'email' =>'required|email',
            // 'password'=>'required',
            'avatar'=>'image',
        ];
    }
    public function messages(){
        return [
            'name.required' =>'vui lòng nhập name',
            'email.required'=>'vui lòng nhập email của bạn',
            'email.email'=>'email không đúng định dạng',
            // 'password.required'=>'vui lòng nhập password',
            'avatar.image'=>'định dạng img không đúng',
        ];
    }
}
