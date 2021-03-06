<?php

/**
 * --------------------------------------------------*
 *  LhinkPHP遵循Apache2开源协议发布  Link ALL Thing  *
 * --------------------------------------------------*
 *  @author LiuJun     Mail-To:liujun2199@vip.qq.com *
 * --------------------------------------------------*
 * Copyright (c) 2017 LinkPHP. All rights reserved.  *
 * --------------------------------------------------*
 *                 LinkPHP框架入口文件               *
 * --------------------------------------------------*
 */

 //类文件后缀常量
 const EXT = '.php';
 const SYS = '.php';
 const DS = '\\';

 //版本信息
 define('LINKPHP_VERSION','1.0.0');
 //声明路径常量
 //目录基础常量的定义
 defined('ROOT_PATH') or define('ROOT_PATH',dirname(__DIR__ ) . '/');
 //定义站点入库文件夹目录常量
 defined('WEB_PATH') or define('WEB_PATH',ROOT_PATH . 'www/');
 //定义框架加载文件夹目录常量
 defined('LOAD_PATH') or define('LOAD_PATH',ROOT_PATH . 'loaders/');
 //定义框架运行产生文件文件夹目录常量
 defined('RUNTIME_PATH') or define('RUNTIME_PATH',ROOT_PATH . 'runtimes/');
 defined('APPLICATION_PATH') or define('APPLICATION_PATH', ROOT_PATH . 'assets/');
 //定义Composer目录常量
 defined('VENDOR_PATH') or define('VENDOR_PATH', ROOT_PATH . 'vendor/');
 //定义缓存目录常量
 defined('CACHE_PATH') or define('CACHE_PATH', ROOT_PATH . 'resource/');
 //定义应用公共目录常量
 defined('COMMON_PATH') or define('COMMON_PATH', APPLICATION_PATH . 'common/');
 //定义公共附件目录常量
 defined('__ATTACH__') or define('__ATTACH__', CACHE_PATH . 'attachment/');
 //定义LinkPHP框架目录常量
 defined('FRAMEWORK_PATH') or define('FRAMEWORK_PATH', ROOT_PATH . 'framework/');
 //定义LinkPHP框架核心类目录常量
 defined('CORE_PATH') or define('CORE_PATH', FRAMEWORK_PATH . 'linkphp/boot/');
 //定义LinkPHP框架启动目录常量
 defined('BOOT_PATH') or define('BOOT_PATH', FRAMEWORK_PATH . 'linkphp/');
 //定义LinkPHP框架扩展类库目录常量
 defined('UTIL_PATH') or define('UTIL_PATH', FRAMEWORK_PATH . 'util/');
 //定义LinkPHP框架附加文件目录常量
 defined('EXTRA_PATH') or define('EXTRA_PATH', FRAMEWORK_PATH . 'extra/');
 //定义LinkPHP框架系统文件目录常量
 defined('SYSTEM_PATH') or define('SYSTEM_PATH', BOOT_PATH . 'system/');
 //定义LinkPHP框架语言目录常量
 defined('LANG_PATH') or define('LANG_PATH', BOOT_PATH . 'extra/lang/');
 //定义LinkPHP框架附件目录常量
 defined('TEMP_PATH') or define('TEMP_PATH', BOOT_PATH . 'extra/temp/');

 //系统可变常量
 defined('APP_INTERFACE_ON') or define('APP_INTERFACE_ON','FALSE'); //开启接口应用
 defined('APP_NAMESPACE_NAME') or define('APP_NAMESPACE_NAME','assets'); //定义应用名称
 defined('APP_DEBUG') or define('APP_DEBUG',FALSE); //开启站点调试
 defined('SYSTEM_LANGUAGE') or define('SYSTEM_LANGUAGE','');
 define('IS_CLI',PHP_SAPI == 'cli' ? true : false);

