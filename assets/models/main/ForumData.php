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

class ForumData
{
    static public function getForumData()
    {
        return Db::table('lp_forum')
            ->field('*')
            ->select();
    }

    static public function pushData()
    {
        try{
            $data['title'] = $_POST['title'];
            $data['c_id'] = 1;
            $data['u_id'] = 2;
            $data['post_time'] = date('Y-m-d H:i:s',time());
            $res['f_id'] = Db::table('lp_forum')
                ->insert($data);
            $res['content'] = $_POST['desc'];
            $res['u_id'] = 2;
            $res['post_time'] = date('Y-m-d H:i:s',time());
            return Db::table('lp_content')
                ->insert($res);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    static public function getItemsData()
    {
        return Db::table('lp_forum')
            ->field('*')
            ->where("where f_id = " . $_POST['id'])
            ->find();
    }

    static public function getTypeData()
    {
        $res = Db::table('lp_class')
            ->field('*')
            ->where('where p_id = 0')
            ->select();
        if(is_array($res) && !empty($res)){
            foreach($res as $k => $v){
                $res[$k]['cid'] = Db::table('lp_class')
                    ->field('*')
                    ->where('where p_id = ' . $v['id'])
                    ->select();
            }
        }
        return $res;
    }

    static public function getChildTypeData()
    {
        $res = Db::table('lp_class')
            ->field('*')
            ->where('where p_id = 0')
            ->select();
        $child = [];
        if(is_array($res) && !empty($res)){
            foreach($res as $k => $v){
                $child[] = Db::table('lp_class')
                    ->field('*')
                    ->where('where p_id = ' . $v['id'])
                    ->select();
            }
        }
        return $child;
    }
}