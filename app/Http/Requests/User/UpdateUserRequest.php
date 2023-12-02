<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $id = $this->route('id');
        return [
            'name' => [
                'required',
                Rule::unique('App\Models\User')->ignore($id, 'id')->where(function ($query) {
                    $query->where('deleted_at', NULL);
                })
            ],
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Chưa nhập tên',
            'name.unique' => 'Tên ko dc trùng nhau',
        ];
    }
}
