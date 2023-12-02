<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class CreateAdminRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
            'email' => [
                'required',
                Rule::unique('App\Models\Admin')->where(function ($query) {
                    $query->where('deleted_at', null);
                })
            ],
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Chưa nhập tên',
            'password.required' => 'Chưa nhập password',
            'password_confirmation.same' => 'confirm password không giống pasword',
            'password_confirmation.required' => 'Chưa nhập confirm password',
            'email.required' => 'Chưa nhập email',
            'email.unique' => 'Email ko dc trùng nhau',
        ];
    }
}
