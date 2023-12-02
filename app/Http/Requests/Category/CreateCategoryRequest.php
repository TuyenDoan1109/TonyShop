<?php

namespace App\Http\Requests\Category;

use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class CreateCategoryRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
//        dd(request()->name);
        return [
            'name' => [
                'required',
                Rule::unique('App\Models\Category')->where(function ($query) {
                    $query->where('deleted_at', null);
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
