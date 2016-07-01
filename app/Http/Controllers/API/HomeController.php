<?php

namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

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
     * 身份证服务
     * 由内建的第三方composer包 `douyasi/identity-card` 提供 
     */
    public function getIdentityCard(Request $request)
    {
        $data = [
            'status' => 0,
            'result' => 'invaild identity-card number',
        ];
        $pid = $request->input('pid');
        if ($pid) {
            $ID = app('Douyasi\IdentityCard\ID') ;
            $is_pass = $ID->validateIDCard($pid);  //校验身份证证号是否合法
            if ($is_pass) {
                $area = $ID->getArea($pid);  //获取身份证所在地信息 遵循GB/T 2260-2007中华人民共和国行政区划代码 标准
                $gender = $ID->getGender($pid);  //获取性别 'f'表示女，'m'表示男，校验失败返回false
                $birthday = $ID->getBirth($pid);  //获取出生日期，失败则返回false
                $data = [
                    'status' => 1,
                    'result' => compact('is_pass', 'area', 'gender', 'birthday'),
                ];
            }
        }
        return new JsonResponse($data);
    }


    /**
     * IP归属地服务
     * 由第三方在线API (http://ip.taobao.com/) 提供
     */
    public function getIP(Request $request)
    {
        $ip = $request->input('ip', $request->ip());
        $urlTaobao = 'http://ip.taobao.com/service/getIpInfo.php?ip='.$ip;
        $json = @file_get_contents($urlTaobao);
        if (isset($json) && $json) {
            $jsonDecode = json_decode($json);
            if ($jsonDecode->code == 0) {
                $data = [
                    'status' => 1,
                    'result' => [
                        'ip' => $ip,
                        'country' => $jsonDecode->data->country,
                        'country_id' => $jsonDecode->data->country_id,
                        'province' => $jsonDecode->data->region,
                        'city' => $jsonDecode->data->city,
                        'isp' => $jsonDecode->data->isp,
                    ],
                ];
            } else {
                $data = [
                    'status' => 0,
                    'result' => 'invaild ip',
                ];
            }
            return new JsonResponse($data);
        } else {
            $data = [
                'code' => 500,
                'error' => 'Internal Server Error',
                'error_description' => 'check your network and try later',
            ];
            return new JsonResponse($data, 500);
        }
    }

}
