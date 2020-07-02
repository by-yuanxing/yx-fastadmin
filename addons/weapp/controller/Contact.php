<?php
/**
 * Created by PhpStorm.
 * User: 731633799@qq.com
 * Date: 2019/6/4
 * Time: 12:30
 */

namespace addons\weapp\controller;

use addons\weapp\library\Lib;

class Contact extends Common
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
        if ($this->request->isPost()) {
            $data['name'] = $this->request->post("name");
            $data['phone'] = $this->request->post("mobile");
            $data['content'] = $this->request->post("desc");
            $data['createtime'] = time();
            $db = model("admin/WeappGuest");
            $re = $db->insert($data);
            if ($re) {
                Lib::email($data['name'], $data['phone'], $data['content']);
                $this->success("提交成功");
            }
            $this->error("提交失败,请重试");
        }
        return $this->view->fetch();
    }
}
