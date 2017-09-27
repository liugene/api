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
// |               框架启动调度类
// +----------------------------------------------------------------------
namespace assets\controllers\main;
use util\jwt\Jwt;

class Auth
{
    static public function isLogin()
    {
        if(isset($_SERVER['authorization'])){
            $data = Jwt::parse($_SERVER['authorization']);
            if(Jwt::verify($data,'123')){
                echo json_encode(['code' => 1, 'data' => Jwt::arrays($data['payload'])], JSON_UNESCAPED_UNICODE);
            } else {
                echo json_encode(['code' => 304, 'msg' => '非法请求!'], JSON_UNESCAPED_UNICODE);
            }
        } else {
            echo json_encode(['code' => 2, 'msg' => '还未登入!'], JSON_UNESCAPED_UNICODE);
        }
    }
}