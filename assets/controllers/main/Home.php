<?php
namespace assets\controllers\main;
class Home
{
	public function main()
    {
        header("Access-Control-Allow-Origin:*");
        if(!$_POST){
            echo json_encode(['code' => 304, 'msg' => '非法提交!'], JSON_UNESCAPED_UNICODE);
            die;
        }
        phpinfo();
    }
}