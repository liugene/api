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
}