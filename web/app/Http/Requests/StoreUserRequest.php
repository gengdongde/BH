<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreUserRequest extends Request
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
            'tel'=>'required|regex:/^[1][356789]{1}[0-9]{9}$/|unique:user',
            'email'=>'required|email|unique:user',
            'upwd'=>'required|regex:/^[\w]{6,16}$/',
            'reupwd'=>'required|same:upwd',
            'uname'=>'required|unique:user_details',
            'sex'=>'required'
        ];
    }

    /**
     * 获取已定义验证规则的错误消息。
     *
     * @return array
     */
    public function messages()
    {
        return [
            'tel.required'=>'手机号必填',
            'tel.regex'=>'手机号格式错误',
            'tel.unique'=>'手机号已存在',
            'email.required'=>'邮箱必填',
            'email.email'=>'邮箱格式错误',
            'email.unique'=>'邮箱已存在',
            'upwd.required'=>'密码必填',
            'upwd.regex'=>'密码格式错误',
            'reupwd.required'=>'确认密码必填',
            'reupwd.same'=>'两次密码不一致',
            'uname.required'=>'用户名必填',
            'sex.required'=>'性别必填',
        ];
    }
}
