<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('App\Models\Admin')->where(function ($query) {
                    $query->where('deleted_at', null);
                })
            ],
            'password' => 'required|string|min:6',
            'password-confirm' => 'required|same:password',
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Chưa nhập Tên',
            'email.required' => 'Chưa nhập email',
            'password.required' => 'Chưa nhập password',
            'password-confirm.required' => 'Chưa nhập password-confirm',
        ];
    }
}
