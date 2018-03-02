<?php

namespace App\Http\Requests\Api;

use Dingo\Api\Http\FormRequest;

class VerificationCodeRequest extends FormRequest
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
            'mobile' => 'required|regex:/^1[34578]\d{9}$/|unique:users',
        ];
    }

    public function messages()
    {
        return [
            'mobile.required' => '请输入手机号码',
            'mobile.regex' => '手机号码格式错误',
            'mobile.unique' => '手机号码已存在'
        ];
    }
}
