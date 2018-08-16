<?php

namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Overtrue\Pinyin\Pinyin;

class HomeController extends CommonController
{

    public function getIndex()
    {
        $json = [
            'code' => 404,
            'error' => '404 Not Found',
            'error_description' => 'please read documentation at `http://www.yascmf.com/docs/api.md`',
        ];
        return new JsonResponse($json, '404');
    }

    /**
     * 汉字转拼音
     * 由内建的第三方composer包 `overtrue/laravel-pinyin` 提供 
     */
    public function getPinyin(Request $request)
    {
        $content = $request->input('content');
        $pinyin = new Pinyin();
        $slug = $pinyin->permalink(strtolower($content));
        $data = [
            'status' => 1,
            'content' => $content,
            'slug' => $slug,
        ];
        return new JsonResponse($data);
    }

}
