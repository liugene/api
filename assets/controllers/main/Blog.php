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
use assets\models\main\BlogData;

class Blog
{
    static public function getLists()
    {
        if(!empty(BlogData::getListData())){
            echo json_encode(['code' => 1, 'data' => BlogData::getListData()], JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode(['code' => 2, 'data' => '暂时没有数据!'], JSON_UNESCAPED_UNICODE);
        }
    }

    //获取近期文章
    static public function getNewItems()
    {
        if(!empty(BlogData::getNewItemsData())){
            echo json_encode(['code' => 1, 'data' => BlogData::getNewItemsData()], JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode(['code' => 2, 'data' => '暂时没有数据!'], JSON_UNESCAPED_UNICODE);
        }
    }

    //博客发布
    static public function push()
    {
        if(!$_POST){
            echo json_encode(['code' => 2, 'msg' => '非法提交!'], JSON_UNESCAPED_UNICODE);
            die;
        }
        if($_POST['title'] == ''){
            echo json_encode(['code' => 2, 'msg' => '帖子标题不能为空!'], JSON_UNESCAPED_UNICODE);
            die;
        }
        if($_POST['desc'] == ''){
            echo json_encode(['code' => 2, 'msg' => '帖子内容不能为空!'], JSON_UNESCAPED_UNICODE);
            die;
        }
        var_dump(BlogData::pushData());die;
        if(BlogData::pushData()){
            echo json_encode(['code' => 1, 'msg' => '发布成功!'], JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode(['code' => 2, 'msg' => '发布失败!'], JSON_UNESCAPED_UNICODE);
        }
    }

}