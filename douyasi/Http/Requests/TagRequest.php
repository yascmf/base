<?php

namespace Douyasi\Http\Requests;

use App\Http\Requests\Request;

class TagRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //return false;
        return true;
    }

    /**
     * 自定义验证规则rules
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->segment(3) ? ','.$this->segment(3).',id' : '';
        $rules = [
            'type' => 'required|integer',
            'name' => 'required|alpha',
        ];
        return $rules;
    }

    /**
     * 自定义验证信息
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => '标签名称不能为空',
            'name.alpha'    => '标签名称必须为常规字符',
            'type.required' => '标签类别不能为空',
            'type.integer'  => '标签类别必须为数字',
        ];
    }
}
