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
// |               站点应用入口文件
// +----------------------------------------------------------------------

 // 定义应用目录
 define('APPLICATION_PATH', dirname(__DIR__) . '/assets/');
 define('APP_INTERFACE_ON',true);
 //加载LinkPHP框架常量文件
 require(dirname(__DIR__) . '/framework/define.php');
 //加载LinkPHP框架启动文件
 require(dirname(__DIR__) . '/framework/bootstrap.php');

 //只需要这么几句话就可以运行 !><!
 //是不是很轻便呀 喵~
 
