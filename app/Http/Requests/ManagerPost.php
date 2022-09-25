<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class ManagerPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required|min:6',
            'password' => 'required|min:6',
            'role_id' => 'required',
        ];
    }

    public static function registerValidate($param)
    {
        return Validator::make($param, [
            'username' => 'required|unique:users|min:6',
            'password' => 'required|min:6',
            'role_id' => 'required',
        ]);
    }

    public static function updateValidate($param)
    {
        return Validator::make($param, [
            'role_id' => 'required',
        ]);
    }
}
