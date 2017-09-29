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
use util\wechat\WeiXin;
use util\log\Log;

class Wechat
{
    static public function main()
    {
        Log::save('');
        WeiXin::receive();
        WeiXin::responseMsg();
    }

    static public function create()
    {
        echo WeiXin::createMenu('123');
    }
}