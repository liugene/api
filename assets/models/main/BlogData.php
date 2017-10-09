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
namespace assets\models\main;
use util\db\Db;
use linkphp\boot\Exception;

class BlogData
{
    static public function getListData()
    {
        return Db::table('lp_blog')
            ->field('*')
            ->where('where is_on = 0')
            ->select();
    }

    static public function getNewItemsData()
    {
        return Db::table('lp_blog')
            ->field('*')
            ->where('where is_on = 0')
            ->select();
    }

    static public function pushData()
    {
        try{
            $data['title'] = $_POST['title'];
            $data['u_id'] = 1;
            $data['post_time'] = date('Y-m-d H:i:s',time());
            $data['content'] = $_POST['desc'];
            $data['pic_url'] = '/resource/static/main/img/mysql.png';
            return Db::table('lp_blog')
                ->insert($data);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}