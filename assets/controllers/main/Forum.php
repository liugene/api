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
use assets\models\main\ForumData;

class Forum
{
    static public function getList()
    {
        header("Access-Control-Allow-Origin:*");
        if(!empty(ForumData::getForumData())){
            echo json_encode(['code' => 1, 'data' => ForumData::getForumData()], JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode(['code' => 2, 'data' => '暂时没有数据!'], JSON_UNESCAPED_UNICODE);
        }
    }

    static public function push()
    {
        header("Access-Control-Allow-Origin:*");
        if(!$_POST){
            echo json_encode(['code' => 2, 'msg' => '非法提交!'], JSON_UNESCAPED_UNICODE);
            die;
        }
        if($_POST['title'] == ''){
            echo json_encode(['code' => 2, 'msg' => '帖子标题不能为空!'], JSON_UNESCAPED_UNICODE);
            die;
        }
        if($_POST['type'] == '' || $_POST['password2'] == ''){
            echo json_encode(['code' => 2, 'msg' => '帖子类型不能为空!'], JSON_UNESCAPED_UNICODE);
            die;
        }
        if($_POST['desc'] == ''){
            echo json_encode(['code' => 2, 'msg' => '帖子内容不能为空!'], JSON_UNESCAPED_UNICODE);
            die;
        }
        if(ForumData::pushData()){
            echo json_encode(['code' => 1, 'msg' => '发帖成功!'], JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode(['code' => 2, 'msg' => '发布失败!'], JSON_UNESCAPED_UNICODE);
        }
    }

    static public function getItems()
    {
        header("Access-Control-Allow-Origin:*");
        if(!empty(ForumData::getItemsData())){
            echo json_encode(['code' => 1, 'data' => ForumData::getItemsData()], JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode(['code' => 2, 'data' => '暂时没有数据!'], JSON_UNESCAPED_UNICODE);
        }
    }

    static public function getType()
    {
        header("Access-Control-Allow-Origin:*");
        if(!empty(ForumData::getTypeData())){
            echo json_encode(['code' => 1, 'data' => ForumData::getTypeData()], JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode(['code' => 2, 'data' => '暂时没有数据!'], JSON_UNESCAPED_UNICODE);
        }
    }
}