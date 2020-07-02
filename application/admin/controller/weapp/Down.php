<?php

namespace app\admin\controller\weapp;

use app\common\controller\Backend;
use addons\weapp\library\Lib;

class Down extends Backend
{

    public function _initialize()
    {
        parent::_initialize();
    }

    /**
     * 下载小程序模板
     */
    public function index()
    {
        $info = get_addon_config("weapp");
        $this->assign("info", $info);
        return $this->view->fetch();
    }

    public function down()
    {
        Lib::setConf();
        $re = Lib::_zip();
        if (!$re) $this->error("小程序文件不存在");
        Lib::down($re);
        @unlink($re);
        $this->success('下载成功');
    }
}
