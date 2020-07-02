<?php

namespace addons\weapp\controller\api;

use think\Config;

/**
 * 首页接口
 */
class Product extends Api
{
    public function product()
    {
        $cat = $this->request->param("cat", false, 'int');
        $db = model("admin/WeappProduct");
        $where = ['status' => "normal"];
        if ($cat) {
            $where['productcat_id'] = $cat;
        }
        $data = $db->where($where)->order("weigh desc,id desc")->paginate(10)->each(function ($v) {
            $v->image = $this->getCdn($v->image);
        });
        return json(["data" => $data]);
    }

    public function product_cat()
    {
        $db = model("admin/WeappProductcat");
        $data = $db->order("weigh desc,id desc")->field("id,name")->select();
        return json($data);
    }

    public function cases_cat()
    {
        $db = model("admin/WeappCasescat");
        $data = $db->order("weigh desc,id desc")->field("id,name")->select();
        return json($data);
    }


    public function detail()
    {
        $cat = $this->request->param("cat");
        $cat = ucfirst($cat);
        $db = model("admin/Weapp$cat");
        $data = $db->find($this->request->param("id"));
        return json($data);
    }

    public function cases()
    {
        $cat = $this->request->param("cat", false, 'int');
        $db = model("admin/WeappCases");
        $where = ['status' => "normal"];
        if ($cat) {
            $where['casescat_id'] = $cat;
        }
        $data = $db->where($where)->order("weigh desc,id desc")->paginate(10)->each(function ($v) {
            $v->image = $this->getCdn($v->image);
        });
        return json(["data" => $data]);
    }

    public function brand()
    {
        $db = model("admin/WeappBrand");
        $data = $db->where(['status' => "normal"])->order("weigh desc,id desc")->paginate(10)->each(function ($v) {
            $v->image = $this->getCdn($v->image);
        });
        return json(["data" => $data]);
    }
}
