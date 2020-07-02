<?php

namespace app\index\controller;

use app\common\controller\Frontend;
use app\index\model\Music as Musics;


class Music extends Frontend
{

    protected $noNeedLogin = '*';
    protected $noNeedRight = '*';
    //protected $layout = '';

	 /**
       * 首页
       */
      public function index()
      {
		vendor('metowolf.Meting');
		$api = new \Metowolf\Meting('netease'); 
		// dump($api);
		
		//$data = $api->format(true)->playlist('3161962148');
		//return json($data);
		
		// [{"id":35847388,"name":"Hello","artist":["Adele"],"album":"Hello","pic_id":"1407374890649284","url_id":35847388,"lyric_id":35847388,"source":"netease"},{"id":33211676,"name":"Hello","artist":["OMFG"],"album":"Hello",...
		
		
		$data = $api->format(true)->url(35847388);
		//echo $data;
		// {"url":"http:\/\/...","size":4729252,"br":128}
		
		/* Start
		 vendor('daryl.Aplayer');
		 $aplayer = new \daryl\Aplayer();
		 //设置歌曲id
		 // $aplayer->setSong('22817204');
		 //设置歌曲songType song or playlist
		 $aplayer->setSongType('playlist'); //To choose song or playlist.
		 //设置歌单id
		 $aplayer->setPlaylist('3161962148'); //aplayer类已有默认id,可自定义设置
		 $aplayer->setAutoplay(true);
		 //$aplayer->out(); //显示
		 End */
		
		  
		  
		  
		// $rows = Musics::all(['status'=>'normal']);
		// $list = collection($rows) -> toArray();
   		// dump($list);
   		
		//return json($list);
		$this->view->assign('title', '音乐随心听');

		return $this->view->fetch();
      }
	 
	
}
