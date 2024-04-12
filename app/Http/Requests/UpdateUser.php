<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            // 'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ];
    }
    public function messages()
    {
        return [
            'alpha'=> ':attribute chỉ được chứa chữ cái',
            'required' => ':attribute không được bỏ trống',
            'unique' => ':attribute đã được sử dụng',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Tên',
            'email' => 'Email',
            'password' => 'Mật khẩu'
        ];
    }
}
