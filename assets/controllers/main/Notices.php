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
use assets\models\main\NoticesData;

class Notices
{
    static public function getNotices()
    {
        header("Access-Control-Allow-Origin:*");
        if(!empty(NoticesData::getNoticesData())){
            echo json_encode(['code' => 1, 'data' => NoticesData::getNoticesData()], JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode(['code' => 2, 'data' => '暂时没有数据!'], JSON_UNESCAPED_UNICODE);
        }
    }
}