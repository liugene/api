<?php

// +----------------------------------------------------------------------
// | LinkPHP [ Link All Thing ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 http://linkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liugene <liujun2199@vip.qq.com>
// +----------------------------------------------------------------------
// |               配置类
// +----------------------------------------------------------------------
namespace assets\controllers\main;
use assets\models\main\LoginData;

class Login
{
    //注册
    static public function reg()
    {
    }

    static public function Login()
    {
        header("Access-Control-Allow-Origin:*");
        if(LoginData::check()){
            return json_encode(['code' => 1, 'msg' => '登入成功!'], JSON_UNESCAPED_UNICODE);
        } else {
            return json_encode(['code' => 2, 'msg' => '登入失败!'], JSON_UNESCAPED_UNICODE);
        }
    }
}