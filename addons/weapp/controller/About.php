<?php
/**
 * Created by PhpStorm.
 * User: 731633799@qq.com
 * Date: 2019/6/4
 * Time: 12:30
 */

namespace addons\weapp\controller;

class About extends Common
{

    /**
     * 首页
     */
    public function index()
    {
        $this->assign("about", $this->about());
        return $this->view->fetch();
    }

    public function about()
    {
        $db = model("admin/WeappAbout");
        $data = $db->field("id,image,content")->find();
        return $data;
    }
}