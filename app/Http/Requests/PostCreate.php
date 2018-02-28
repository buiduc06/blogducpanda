<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostCreate extends FormRequest
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
            'title' =>'required',
            'summary'=>'required',
            'avatar' => 'required|image',
            'content' =>'required',
        ];
    }
    public function messages(){
        return [
            'title.required' =>'vui lòng điền dữ liệu',
            'summary.required' =>'vui lòng điền dữ liệu',
            'avatar.required' =>'vui lòng chon ảnh',
            'avatar.image' =>'vui lòng chọn ảnh đúng định dạng',
            'content.required' =>'vui lòng điền dữ liệu',
        ];
    }
}
