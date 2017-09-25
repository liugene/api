<?php
namespace assets\controllers\main;
use assets\models\main\HomeData;

class Home
{
	public function main()
    {
        if(!$_POST){
            echo json_encode(['code' => 304, 'msg' => '非法提交!'], JSON_UNESCAPED_UNICODE);
            die;
        }
        phpinfo();
    }

    static public function getItems()
    {
        if(!empty(HomeData::getItemsData())){
            echo json_encode(['code' => 1, 'data' => HomeData::getItemsData()], JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode(['code' => 2, 'data' => '暂时没有数据!'], JSON_UNESCAPED_UNICODE);
        }
    }
}