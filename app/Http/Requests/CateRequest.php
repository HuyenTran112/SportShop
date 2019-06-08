<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CateRequest extends FormRequest
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
            'txtCateName'=>'required|unique:loaisanpham,tenloaisanpham'
        ];
    }
	public function messages()
	{
		 return [
            'txtCateName.required'=>'Please Enter Name Category',
			'textCateName.unique'=>'This Name Category is Exist'
        ];
		
	}
}
