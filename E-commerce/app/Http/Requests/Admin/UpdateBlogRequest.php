<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
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
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required',
            'content' => 'required',

        ];
    }


    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',

        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Title' ,
            'image' => 'Image',
            'description' => 'Description',
            'content'  => 'Content',
        ];
    }
}
