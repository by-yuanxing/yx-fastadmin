<?php
/**
 * Created by PhpStorm.
 * User: 731633799@qq.com
 * Date: 2019/6/4
 * Time: 12:30
 */

namespace addons\weapp\controller;

class Index extends Common
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
        $db = model("admin/WeappAbout");
        $about = $db->find();
        $this->assign("about", $about);
        $this->assign("product", $this->product());
        $this->assign("cases", $this->cases());
        $this->assign("brand", $this->brand());
        return $this->view->fetch();
    }

    public function about()
    {
        return $this->view->fetch("page");
    }

    public function brand()
    {
        $db = model("admin/WeappBrand");
        $data = $db->where([
            'status' => "normal",
            "push"   => 1
        ])->order("weigh desc,id desc")->limit(0, 4)->select();
        return $data;
    }

    public function product()
    {
        $db = model("admin/WeappProduct");
        $data = $db->where([
            'status' => "normal",
            "push"   => 1
        ])->order("weigh desc,id desc")->select();
        return $data;
    }

    public function cases()
    {
        $db = model("admin/WeappCases");
        $data = $db->where([
            'status' => "normal",
            "push"   => 1
        ])->order("weigh desc,id desc")->select();
        return $data;
    }
}
