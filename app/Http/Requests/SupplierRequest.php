<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\SupplierRequest;

class SupplierRequest extends FormRequest
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
            'txtName'=>'required|unique:nhacungcap,tennhacungcap',
			'txtAddress'=>'required: nhacungcap, diachi',
			'txtPhone'=>'required: nhacungcap, dienthoai',
			'txtEmail'=>'required: nhacungcap, email'
        ];
    }
	public function messages()
	{
		return [
            'txtName.required'=>"Vui lòng nhập tên nhà cung cấp",
			'txtName.unique'=>'Tên nhà cung cấp đã tồn tại',
			'txtAddress.required'=>"Vui lòng nhập địa chỉ",
			'txtPhone.required'=>"Vui lòng nhập số điện thoại",
			'txtEmail.required'=>"Vui lòng nhập email"
        ];
		
	}
}
