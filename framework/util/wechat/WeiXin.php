<?php

namespace util\wechat;
use linkphp\boot\Configure;
use util\curl\Curl;
/**
 * --------------------------------------------------*
 *  LhinkPHP遵循Apache2开源协议发布  Link ALL Thing  *
 * --------------------------------------------------*
 *  @author LiuJun Mail-To:liujun2199@vip.qq.com *
 * --------------------------------------------------*
 * Copyright (c) 2017 LinkPHP. All rights reserved.  *
 * --------------------------------------------------*
 *              LinkPHP框架微信验证操作类            *
 * --------------------------------------------------*
 */

class WeiXin{

    static private $access_token;
    static private $time;

       static public function verify()
       {
           if(isset($_GET['nonce']) && isset($_GET['timestamp']) && isset($_GET['signature']) && isset($_GET['echostr'])){
               //获得参数 signatrue token timestamp echostr
               //先获取到这三个参数
               $signature = $_GET['signature'];
               $nonce = $_GET['nonce'];
               $timestamp = $_GET['timestamp'];
               $echostr = $_GET['echostr'];

               //把这三个参数存到一个数组里面
               $tmpArr = array($timestamp,$nonce,'linkphp');
               //进行字典排序
               sort($tmpArr);

               //把数组中的元素合并成字符串，impode()函数是用来将一个数组合并成字符串的
               $tmpStr = implode($tmpArr);

               //sha1加密，调用sha1函数
               $tmpStr = sha1($tmpStr);
               if($tmpStr == $signature){
                   ob_clean();
                   echo $echostr;
                   die;
               } else {
                   echo '验证失败!';
               }
           } else {
               echo '请求缺少必要参数!';
           }
       }
    static public function createMenu()
    {
        static::getWxAccessToken();
        var_dump(static::$access_token);die;
        $url = 'https://api.weixin.qq.com/cgi-bin/menu/create?access_token=' . static::$access_token;
        $menu = '{
                   "button":[
                   {
                        "type":"click",
                        "name":"最新文章",
                        "key":"V1001_TODAY_NEWS"
                    },
                    {
                         "name":"热门",
                         "sub_button":[
                          {
                             "type":"click",
                             "name":"赞一下我们",
                             "key":"V1001_GOOD"
                          }]
                     }]
                 }';
        return Curl::request('post',$url,$menu);
    }
       public function reponseMsg()
         {
             //1、获取微信推送过来的POST数据(xml格式)
             $postArr = $GLOBALS['HTTP_RAW_POST_DATA'];
             //2、处理消息类型，并设置回复类型和内容
             $postObj = simplexml_load_string($postArr);
             //$postObj->ToUserName = '';
             //$postObj->FromUseName = '';
             //$postObj->CreateTime = '';
             //$postObj->MsgType = '';
             //$postObj->Event = '';
             //判断该数据包是否为订阅的事件推送
             if(strtolower($postObj->MsgType) == 'event'){
                 //如果是关注subscribe事件
                 if(strtolower($postObj->Event) == 'subscribe'){
                     //回复用户消息
                     $toUser = $postObj->FormUserName;
                     $formUser = $postObj->ToUserName;
                     $time = time();
                     $msgType = 'text';
                     $content = '欢迎关注';
                     $template = "

                     ";
                     $info = sprintf($template,$toUser,$formUser,$time,$msgType,$content);
                 }
                 //扫描带参数二维码时间如果是重扫二维码
                 if(strtolower($postObj->Event) == 'scan'){
                     if($postObj->EventKey == 2000){
                         //如果是临时二维码扫码
                         $tmp = '临时二维码';
                     }
                     if($postObj->EventKey == 300){
                         //如果是永久二维码扫码
                         $tmp = '永久二维码';
                     }
               }
           }
           //接收用户发送过来的信息进行比较然后回复文本内容
           if(strtolower($postObj->MsgType) == 'text')
           {
               if(strtolower($postObj->Content) == 'LinkPHP'){
                   $template = "";
                   $formUser = $postObj->ToUserName;
                   $toUser = $postObj->FormUserName;
                   $time = time();
                   $content = 'LinkPHP是一个开源的轻便框架';
                   $msgType = 'text';
                   $info = sprintf($template,$formUser,$toUser,$time,$content,$msgType);

               }
           }
           if(strtolower($postObj->MsgType) == 'text'){
               switch(trim($postObj->Content)){
                   case 1:
                   $content = '您输入的数字是1';
                   break;
                   case 2:
                   $content = '您输入的数字是2';
                   break;

               }
               $template = "";
               $formUser = $postObj->ToUserName;
               $toUser = $postObj->FormUserName;
               $time = time();
               //$content = '';
               $msgType = 'text';
               $info = sprintf($template,$formUser,$toUser,$time,$content,$msgType);
           }
           if(strtolower($postObj->MsgType) == 'text'){
               if(strtolower($postObj->Content) == '图文'){
               $toUser = $postObj->FormUserName;
               $formUser = $postObj->ToUserName;
               $arr = array(
                 'title' => 'Linkphp',
                 'description'=>"LinkPHP是一个php开源框架",
                 'picurl' => '',
                 'url' => 'http://www.linkphp.cn',
               );
               //回复图文消息
               $template = "<xml>
                            <ToUserName><![CDATA[toUser]]></ToUserName>
                            <FromUserName><![CDATA[fromUser]]></FromUserName>
                            <CreateTime>12345678</CreateTime>
                            <MsgType><![CDATA[news]]></MsgType>
                            <ArticleCount>.count($arr).</ArticleCount>
                            <Articles>";
                            foreach ($arr as $k=>$v){
                                $template .= "<item>
                            <Title><![CDATA[".$v['title']."]]></Title>
                            <Description><![CDATA["                     .$v['description']."]]></Description>
                            <PicUrl><![CDATA[".$v['picur']."]]></PicUrl>
                            <Url><![CDATA[".$v['url']."]]></Url>
                            </item>";
       }

       $template .= "</Articles>
                     </xml>";
           }
           }
       }
       static public function getWxAccessToken()
       {
           //判断是否初次请求
           if(!isset(static::$access_token)){
               //1、请求access_token地址
               $appid = Configure::get('wx_appid');
               $appsecret = Configure::get('wx_secret');
               $url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=' . $appid . '&secret=' . $appsecret . '';
               $token = json_decode(Curl::request('get',$url),true);;
               static::$access_token = $token['access_token'];
               static::$time = time();
           } else {
               $now = time();
               if(($now-static::$time)>7200){
                   //1、请求access_token地址
                   $appid = Configure::get('wx_appid');
                   $appsecret = Configure::get('wx_secret');
                   $url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=' . $appid . '&secret=' . $appsecret . '';
                   $token = json_decode(Curl::request('get',$url),true);;
                   static::$access_token = $token['access_token'];
                   static::$time = time();
               }
           }
       }
       static public function getWxserverIp()
       {
           $accessToken = "";
           $url = "";
           $ch = curl_init();
           curl_setopt($ch,CURL_URL,$url);
           curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
           $res = curl_exec($ch);
           curl_close($ch);
           if(curl_errno($ch)){
               var_dump(curl_error($ch));
           }
       }
       //获取微信模板消息
    public function sendTemplateMsg()
       {
           //获取到access_token
           $access_token = $this->getWxAccessToken();
           $url = "";
           //组装数组
           $array = array(
             'touser' => '',
             'template_id' => '',
             'url' => '',
             'data' => array(
                'name' => array('value' => 'hello','color' => '#000'),
                'money' => array('value' => 100,'color' => '#000'),
                'data' => array('value' => date('Y-m-d H:i:s'),'color' => '#000'),
             ),
           );
           //将数组转成json格       式
           $postJson = json_encode($array);
           //调用curl函数
           $this->http_curl();

       }
}

