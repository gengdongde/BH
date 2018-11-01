<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class Topic extends Request
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
     * Topic添加验证规则
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tname'=>'required|exists:topic,tname',
        ];
    }

    public function messages()
    {
        return [
            'tname.required'=>'请填写话题名称',
            'tname.exists'=>'以有话题',
        ];
    }

}
