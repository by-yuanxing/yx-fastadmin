<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 2019/3/5
 * Time: 8:58
 */

namespace addons\weapp\controller\api;

use think\addons\Controller;

class Api extends Controller
{
    public function getCdn($link) //静态资源地址  兼容本地二级目录
    {
        $url = preg_replace("/\/(\w+)\.php$/i", '', request()->root());
        $http_type = $_SERVER['SERVER_PORT'] == 443 ? 'https://' : 'http://';
        return empty($url) ? cdnurl($link, true) : $http_type . $_SERVER['HTTP_HOST'] . $url . $link;
    }
}
