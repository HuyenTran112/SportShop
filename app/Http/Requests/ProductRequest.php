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
            'txtName'=>'required|unique:sanpham,tensp',
			'txtCategory'=>'required:sanpham, maloaisp',
			'txtPrice'=>'required|integer: sanpham,dongia',
			'txtPromotion'=>'integer: sanpham, giakhuyenmai',
			'fImages' => 'required|image'
        ];
		
    }
	public function messages()
	{
		return [
            'txtName.required'=>'Vui lòng nhập tên sản phẩm',
			'txtName.unique'=>'Tên loại sản phẩm đã tồn tại',
			'txtCategory.required'=>'Vui lòng chọn loại sản phẩm',
			'txtPrice.required'=>'Vui lòng nhập giá sản phẩm',
			'txtPrice.integer'=>'Đơn giá phải là số',
			'txtPromotion.required'=>'Giá khuyến mãi phải là số',
			'fImages.required' => 'Vui lòng chọn hình ảnh',
			'fImages.image' => 'Bạn phải chọn file hình ảnh',
			
        ];
	}
}
