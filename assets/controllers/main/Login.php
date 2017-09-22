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
        header("Access-Control-Allow-Origin:*");
        if($_POST['password1'] !== $_POST['password2'])
        {
            echo json_encode(['code' => 2, 'msg' => '两次密码不一致!'], JSON_UNESCAPED_UNICODE);
            die;
        }
        dump(LoginData::register());die;
        if(LoginData::register()){
            echo json_encode(['code' => 1, 'msg' => '注册成功!'], JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode(['code' => 2, 'msg' => '注册失败!'], JSON_UNESCAPED_UNICODE);
        }
    }

    static public function Login()
    {
        header("Access-Control-Allow-Origin:*");
        if(LoginData::check()){
            echo json_encode(['code' => 1, 'msg' => '登入成功!'], JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode(['code' => 2, 'msg' => '登入失败!'], JSON_UNESCAPED_UNICODE);
        }
    }
}