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

class WikiData
{
    static public function getWikiName()
    {
        $res = Db::table('lp_wiki')
            ->field('*')
            ->where('where p_id = 0')
            ->select();
        if(is_array($res) && !empty($res)){
            foreach($res as $k => $v){
                $res[$k]['cid'] = Db::table('lp_wiki')
                    ->field('*')
                    ->where('where p_id = ' . $v['id'])
                    ->select();
            }
        }
        return $res;
    }
}