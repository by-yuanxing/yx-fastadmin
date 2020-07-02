<?php

namespace app\api\controller;

use app\common\controller\Api;
use app\index\model\Music as Musics;
/**
 * 示例接口
 */
class Music extends Api
{
	//如果$noNeedLogin为空表示所有接口都需要登录才能请求
	//如果$noNeedRight为空表示所有接口都需要验证权限才能请求
	//如果接口已经设置无需登录,那也就无需鉴权了
	//
	// 无需登录的接口,*表示全部
	protected $noNeedLogin = ['*'];
	// 无需鉴权的接口,*表示全部
	protected $noNeedRight = ['*'];

    public function index()
    {
	   
		// $list = Musiscs::all();
		 $where = '';
		 $list = Musics::where($where)->order('id desc')->select();
		 //dump($list);
		 if(!$list){
		         $this->error('暂无数据');
		     }
		     
		     $this->success('成功',$list);
		// $this->success('返回成功', ['list' => $list]);
			
    }



}
