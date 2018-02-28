<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class modulesrq extends FormRequest
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
            'name' =>'required',
            'routemodule'=>'required',
        ];
    }
    public function messages(){
        return [
            'name.required' =>'vui lòng điền dữ liệu',
            'routemodule.required' =>'vui lòng điền dữ liệu',
        ];
    }
}
