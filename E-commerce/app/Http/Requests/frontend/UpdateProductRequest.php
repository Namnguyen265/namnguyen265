<?php

namespace App\Http\Requests\frontend;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            //

            // 'email' => 'unique:email:user',
            'name' => 'required',
             'price'  => 'required|numeric',
            
            
            // 'sale'  => 'numeric',
            'company'  => 'required',
            'image.*'  => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'detail' => 'required'
        ];
    }


    public function messages()
    {
        return [
            'required' => ':attribute khong duoc de trong',
            // 'numeric'      => ':attribute phải là 1 số',
            'image'      => ':attribute phải là file ảnh',
            // 'unique'   => 'Mỗi người dùng chỉ có duy nhất 1 email',
            // 'email'    => ':attribute chưa đúng cú pháp',
            // 'alpha_num'=> ':attribute nhập phải là số',
            // 'regex'    => ':attribute không hợp lệ',
            // 'integer'  => ':attribute phải là số nguyên',
            // 'between'  => ':attribute phải từ :min đến :max',
            
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên',
            'price'  => 'Giá',
            // 'sale'  => 'Giảm giá',
            'company'   => 'Tên công ty',
            //  'address'    => 'Địa chỉ',
            'image'  => 'Hình ảnh',
        ];
    }




}
