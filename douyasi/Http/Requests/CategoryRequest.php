<?php

namespace Douyasi\Http\Requests;

use App\Http\Requests\Request;

class CategoryRequest extends Request
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
            'name' => 'required|alpha',
            'slug' => 'required|regex:/^[a-z0-9\-_]{3,20}$/|unique:categories,slug'.$id,
            'sort' => 'required|numeric',
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
            'name.required' => '分类名称不能为空',
            'name.alpha'    => '分类名称必须为常规字符',
            'slug.required' => '分类别名不能为空',
            'slug.regex'    => '分类别名不符合组合规则([a-z0-9\-_]{3,20})',
            'slug.unique'   => '分类别名已存在',
            'sort.required' => '分类排序不能为空',
            'sort.numeric'  => '分类排序必须为数字',
        ];
    }
}
