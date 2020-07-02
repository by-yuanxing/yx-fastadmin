<?php

namespace app\admin\controller;

use app\common\controller\Backend;

/**
 * 测试管理
 *
 * @icon fa fa-circle-o
 */
class Test extends Backend
{
    
    /**
     * Test模型对象
     * @var \app\admin\model\Test
     */
    protected $model = null;
	//关联
	protected $relationSearch = true;
	//是否开启数据限制
	
	protected $dataLimit = 'personal'; 

    public function _initialize()
    {
        parent::_initialize();
        $this->model = new \app\admin\model\Test;
        $this->view->assign("weekList", $this->model->getWeekList());
        $this->view->assign("flagList", $this->model->getFlagList());
        $this->view->assign("genderdataList", $this->model->getGenderdataList());
        $this->view->assign("hobbydataList", $this->model->getHobbydataList());
        $this->view->assign("statusList", $this->model->getStatusList());
        $this->view->assign("stateList", $this->model->getStateList());
    }
	 /**
	     * 查看
	     */
	    public function index()
	    {
			//设置过滤方法
			$this->request->filter(['strip_tags']);
	        if ($this->request->isAjax()) {
				//如果发送的来源是Selectpage，则转发到Selectpage
				if ($this->request->request('keyField')) {
					//dump($this->request->request('keyField'));
				    return $this->selectpage();
				}
	            list($where, $sort, $order, $offset, $limit) = $this->buildparams();
	            $total = $this->model
	                    ->with("admin","category")
	                    ->where($where)
	                    ->order($sort, $order)
	                    ->count();
	            $list = $this->model
	                    ->with("admin","category")
	                    ->where($where)
	                    ->order($sort, $order)
	                    ->limit($offset, $limit)
	                    ->select();
				//addtion() 附加关联字段数据
				$list = addtion($list, 'category_id,category_ids');
				//$list = addtion($list, 'admin_id'); //单个不需要使用addtion
			
	            $result = array("total" => $total, "rows" => $list);
	            return json($result);
	        }
	        return $this->view->fetch();
	    }
    
    /**
     * 默认生成的控制器所继承的父类中有index/add/edit/del/multi五个基础方法、destroy/restore/recyclebin三个回收站方法
     * 因此在当前控制器中可不用编写增删改查的代码,除非需要自己控制这部分逻辑
     * 需要将application/admin/library/traits/Backend.php中对应的方法复制到当前控制器,然后进行修改
     */
    

}
