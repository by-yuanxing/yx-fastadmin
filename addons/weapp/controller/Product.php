<?php
/**
 * Created by PhpStorm.
 * User: 731633799@qq.com
 * Date: 2019/6/4
 * Time: 12:30
 */

namespace addons\weapp\controller;

class Product extends Common
{
    public function _initialize()
    {
        parent::_initialize();
    }

    public function index()
    {
        $this->assign("list", $this->plist());
        return $this->view->fetch();
    }

    public function plist()
    {
        $cat = $this->request->param("cat", 0, 'int');
        $db = model("admin/WeappProduct");
        $where = ['status' => "normal"];
        if ($cat) {
            $where['productcat_id'] = $cat;
        }
        $data = $db->where($where)->order("weigh desc,id desc")->paginate(10);
        return $data;
    }
}
