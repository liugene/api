<?php
namespace assets\controllers\main;
use assets\models\main\HomeData;
use util\jwt\Jwt;

class Home
{
	public function main()
    {

        $data = ['user_id' => 1, 'email' => '750688237@qq.com'];
        $key = '123';
        var_dump(Jwt::sign($data,$key));
        var_dump(Jwt::parse(Jwt::sign($data,$key)));
        var_dump(Jwt::verify(Jwt::parse(Jwt::sign($data,$key)),$key));
//        phpinfo();
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