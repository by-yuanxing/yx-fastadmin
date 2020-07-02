<?php

namespace addons\weapp\controller\api;

use think\Config;

/**
 * 首页接口
 */
class About extends Api
{

    /**
     * 首页
     *
     */
    public function index()
    {
        $db = model("admin/WeappAbout");
        $data = $db->field("id,content")->find();
        return json($data);
    }

    public function contact()
    {
        $db = model("admin/WeappAbout");
        $data = $db->field("id,contact_content")->find();
        return json($data);
    }

}
