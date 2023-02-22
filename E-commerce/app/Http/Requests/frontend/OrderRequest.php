<?php

namespace App\Http\Requests\frontend;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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

            
                
                
                
                
                'phone' => 'required|size:10|regex:/(09)[0-9]{8}/',
                 'address'  => 'required',
                
                
            
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'max'      => ':attribute khong duoc qua :max ki tu',
            'min'      => ':attribute phai co it nhat :min ki tu',
            // 'unique'   => 'Mỗi người dùng chỉ có duy nhất 1 email',
            'email'    => ':attribute chưa đúng cú pháp',
            'alpha_num'=> ':attribute nhập phải là số',
            'regex'    => ':attribute không hợp lệ',
            // 'integer'  => ':attribute phải là số nguyên',
            // 'between'  => ':attribute phải từ :min đến :max',
            'size'  => ':attribute không được vượt quá 10 số'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên',
            'email'  => 'Email',
            'password'  => 'Mật khẩu',
            'phone'   => 'Số điện thoại',
             'address'    => 'Địa chỉ nhận',
            'avatar'  => 'Avatar',
        ];
    }
}
