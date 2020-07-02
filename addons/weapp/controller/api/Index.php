<?php

namespace addons\weapp\controller\api;


use addons\weapp\library\Lib;

class Index extends Api
{
    /**
     * 首页
     */
    public function index()
    {
        $this->success('安装成功');
    }

    public function banner()
    {
        $weapp = get_addon_config("weapp");
        $site = $weapp["banner"];
        foreach (explode(",", $site) as $key => $v) {
            $banner[] = ['id' => $key, "image" => $this->getCdn($v)];
        }
        return json($banner);
    }

    public function brand()
    {
        $db = model("admin/WeappBrand");
        $data = $db->where(['status' => "normal", "push" => 1])->order("weigh desc,id desc")->paginate()->each(function ($v) {
            $v->image = $this->getCdn($v->image);
        });
        return json($data->items());
    }


    public function product()
    {
        $db = model("admin/WeappProduct");
        $data = $db->where(['status' => "normal", "push" => 1])->order("weigh desc,id desc")->paginate()->each(function ($v) {
            $v->image = $this->getCdn($v->image);
        });
        return json($data->items());
    }


    public function about()
    {
        $db = model("admin/WeappAbout");
        $data = $db->field("id,image,description")->paginate(1)->each(function ($v) {
            $v->image = $this->getCdn($v->image);
        });
        return json($data->items()[0]);
    }


    public function cases()
    {
        $db = model("admin/WeappCases");
        $data = $db->where(['status' => "normal", "push" => 1])->order("weigh desc,id desc")->paginate()->each(function ($v) {
            $v->image = $this->getCdn($v->image);
        });
        return json($data->items());
    }


    public function app()
    {
        $site = get_addon_config("weapp");
        return json(['title' => $site['title'], "call_bg" => $this->getCdn($site['call_bg']), "phone" => $site['phone'], "address" => $site['address'], "location" => $site['location']]);
    }

    public function guest()
    {
        if ($this->request->isPost()) {
            $data['name'] = $this->request->post("name");
            $data['phone'] = $this->request->post("mobile");
            $data['content'] = $this->request->post("desc");
            $data['createtime'] = time();
            $db = model("admin/WeappGuest");
            $re = $db->insert($data);

            if ($re) {
                Lib::email($data['name'], $data['phone'], $data['content']);
                return json(['msg' => "提交成功", "code" => 1001]);
            }
            return json(['msg' => "提交失败,请重试", "code" => false]);
        }
        exit;
    }
}
