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
use assets\models\main\LinksData;

class Links
{
    static public function getLists()
    {
        if(!empty(LinksData::getListData())){
            echo json_encode(['code' => 1, 'data' => LinksData::getListData()], JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode(['code' => 2, 'data' => '暂时没有数据!'], JSON_UNESCAPED_UNICODE);
        }
    }
}