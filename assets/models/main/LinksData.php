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

class LinksData
{
    static public function getListData()
    {
        return Db::table('lp_links')
            ->field('*')
            ->select();
    }
}