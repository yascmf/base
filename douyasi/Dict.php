<?php

namespace Douyasi;

/**
 * 词典配置类
 */
class Dict
{

    public function getDict($dot_key = null, $default = null)
    {
        $dict = [
            'bool' => [
                0 => '无',
                1 => '有',
            ],
            //系统日志类型
            'log_type' => [
                'session'    => '会话',  //会话日志 [登录登出相关]
                'upload'     => '上传',  //上传日志 [上传相关，不包括通过编辑器上传的]
                'security'   => '安全',  //安全日志
                'system'     => '系统',  //系统日志 [系统程序自动触发类型的日志]
                'mail'       => '邮件',  //邮件日志 [记录邮件发送相关日志]
                'management' => '管理',  //管理日志 [管理相关，主要包括增改管理员用户、增改角色、修改系统配置参数等]
                'error'      => '错误',  //错误日志 [主要记录访问400与500类型的错误]
            ],
        ];
        if(is_null($dot_key)) {
            return null;
        }
        return array_get($dict, $dot_key, $default);
    }
}
