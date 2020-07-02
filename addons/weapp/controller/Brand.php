<?php
/**
 * Created by PhpStorm.
 * User: 731633799@qq.com
 * Date: 2019/6/4
 * Time: 12:30
 */

namespace addons\weapp\controller;

class Brand extends Common
{
    public function _initialize()
    {
        parent::_initialize();
    }

    /**
     * 首页
     */
    public function index()
    {
        $this->assign("list", $this->plist());
        return $this->view->fetch();
    }

    public function plist()
    {
        $db = model("admin/WeappBrand");
        $where = ['status' => "normal"];
        $data = $db->where($where)->order("weigh desc,id desc")->paginate(10);
        return $data;
    }
}
