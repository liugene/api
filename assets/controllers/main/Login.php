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
use util\jwt\Jwt;

class Login
{
    //注册
    static public function reg()
    {
        if(!$_POST){
            echo json_encode(['code' => 2, 'msg' => '非法提交!'], JSON_UNESCAPED_UNICODE);
            die;
        }
        if($_POST['account'] == ''){
            echo json_encode(['code' => 2, 'msg' => '账号不能为空!'], JSON_UNESCAPED_UNICODE);
            die;
        }
        if($_POST['password1'] == '' || $_POST['password2'] == ''){
            echo json_encode(['code' => 2, 'msg' => '密码不能为空!'], JSON_UNESCAPED_UNICODE);
            die;
        }
        if($_POST['password1'] !== $_POST['password2']){
            echo json_encode(['code' => 2, 'msg' => '两次密码不一致!'], JSON_UNESCAPED_UNICODE);
            die;
        }
        if(LoginData::findUserByName()){
            echo json_encode(['code' => 2, 'msg' => '账号已经注册,请更换!!'], JSON_UNESCAPED_UNICODE);
            die;
        }
        if(LoginData::register()){
            echo json_encode(['code' => 1, 'msg' => '注册成功!'], JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode(['code' => 2, 'msg' => '注册失败!'], JSON_UNESCAPED_UNICODE);
        }
    }

    static public function Login()
    {
        if(!$_POST){
            echo json_encode(['code' => 2, 'msg' => '非法提交!'], JSON_UNESCAPED_UNICODE);
            die;
        }
        if($_POST['account'] == ''){
            echo json_encode(['code' => 2, 'msg' => '账号不能为空!'], JSON_UNESCAPED_UNICODE);
            die;
        }
        if($_POST['password'] == ''){
            echo json_encode(['code' => 2, 'msg' => '密码不能为空!'], JSON_UNESCAPED_UNICODE);
            die;
        }
        if($result = LoginData::check()){
            echo json_encode(['code' => 1, 'msg' => '登入成功!','token' => Jwt::sign(['user_id' => $result['id'], 'username' => $result['user_name']],'123')], JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode(['code' => 2, 'msg' => '登入失败!'], JSON_UNESCAPED_UNICODE);
        }
    }
}