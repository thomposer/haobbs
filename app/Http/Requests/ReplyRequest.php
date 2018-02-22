<?php

namespace App\Http\Requests;

class ReplyRequest extends Request
{
    public function rules()
    {
        return [
            'content' => 'required|min:2',
        ];
    }

    public function messages()
    {
        return [
            'content.min' => '回复内容最少要 2 个字符！',
            'content.required' => '请输入回复的内容！',
        ];
    }
}
