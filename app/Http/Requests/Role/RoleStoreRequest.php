<?php

namespace App\Http\Requests\Role;

use Illuminate\Foundation\Http\FormRequest;

class RoleStoreRequest extends FormRequest
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

    public function rules()
    {
        return [
            'name' => 'required|unique:users',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không để trống',
            'unique' => ':attribute đã tồn tại',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên quyền',
        ];
    }
}
