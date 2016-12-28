<?php

namespace Douyasi\Http\Requests;

use App\Http\Requests\Request;

class ArticleRequest extends Request
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
            'title'       => 'required|min:3|max:80',
            'slug'        => 'required|regex:/^[a-z0-9\-_]{1,120}$/|unique:articles,slug'.$id,
            'cid'         => 'required|exists:categories,id',
            'description' => 'required|min:10',
            'content'     => 'required|min:20',
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
            'title.required'       => '文章标题不能为空',
            'title.min'            => '文章标题长度不能少于3',
            'title.max'            => '文章标题长度不能多于80',
            'slug.required'        => '文章slug不能为空',
            'slug.regex'           => '文章slug非法',
            'slug.unique'          => '文章slug重复已存在，请更换',
            'cid.required'         => '分类不能为空',
            'cid.exists'           => '不存在此分类ID',
            'description.required' => '文章摘要不能为空',
            'description.min'      => '文章摘要长度不能少于10',
            'content.required'     => '正文不能为空',
            'content.min'          => '正文长度不能少于20',
        ];
    }
}
