<?php
namespace assets\controllers\main;
use linkphp\boot\Api;
use linkphp\system\db\Db;;
class Home extends Api
{
	public function main()
    {
        Db::table('lp_user')->field('id')->select();
    }
}