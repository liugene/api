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
namespace assets\models\main;
use util\db\Db;

class LoginData
{
    static public function findUserByName()
    {
        return Db::table('lp_user')
            ->field('id')
            ->where("where user_name = '" . $_POST['account'] . "'")
            ->find();
    }

    static public function check()
    {
        return Db::table('lp_user')
            ->field('id')
            ->where("where user_name = '" . $_POST['account'] . "' and pass_word = '" . md5(md5($_POST['password'])) . "'")
            ->find();
    }

    static public function register()
    {
        $data['user_name'] = $_POST['account'];
        $data['pass_word'] = md5(md5($_POST['password1']));
        $data['reg_time'] = date('Y-m-d H:i:s',time());
        return Db::table('lp_user')
            ->insert($data);
    }
}