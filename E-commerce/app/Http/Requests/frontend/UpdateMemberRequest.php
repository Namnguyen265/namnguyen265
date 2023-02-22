<?php

namespace App\Http\Requests\frontend;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMemberRequest extends FormRequest
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
            'name' => 'required|min:5|max:20',
            // 'email'  => 'required|email|unique:users,email',
            'password' => 'min:5|max:255',
            'phone' => 'size:10|regex:/(09)[0-9]{8}/',
            //  'address'  => 'required',
            'avatar'  => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute khong duoc de trong',
            'max'      => ':attribute khong duoc qua :max ki tu',
            'min'      => ':attribute phai co it nhat :min ki tu',
            // 'unique'   => 'Mỗi người dùng chỉ có duy nhất 1 email',
            'email'    => ':attribute chưa đúng cú pháp',
            'alpha_num'=> ':attribute nhập phải là số',
            'regex'    => ':attribute không hợp lệ',
            // 'integer'  => ':attribute phải là số nguyên',
            // 'between'  => ':attribute phải từ :min đến :max',
            
        ];
    }


    public function attributes()
    {
        return [
            'name' => 'Tên',
            'email'  => 'Email',
            'password'  => 'Mật khẩu',
            'phone'   => 'Số điện thoại',
            //  'address'    => 'Địa chỉ',
            'avatar'  => 'Avatar',
        ];
    }
}
