<?php

namespace app\admin\model;

use app\admin\library\Auth;
use think\Model;

class AdminLog extends Model
{

    // 开启自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';
    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = '';
    //自定义日志标题
    protected static $title = '';
    //自定义日志内容
    protected static $content = '';

    public static function setTitle($title)
    {
        self::$title = $title;
    }

    public static function setContent($content)
    {
        self::$content = $content;
    }

    public static function record($title = '')
    {
        $auth = Auth::instance();
        $admin_id = $auth->isLogin() ? $auth->id : 0;
        $username = $auth->isLogin() ? $auth->username : __('Unknown');
        $content = self::$content;
        if (!$content) {
            $content = request()->param('', null, 'trim,strip_tags,htmlspecialchars');
            foreach ($content as $k => $v) {
                if (is_string($v) && strlen($v) > 200 || stripos($k, 'password') !== false) {
                    unset($content[$k]);
                }
            }
        }
        $title = self::$title;
        if (!$title) {
            $title = [];
            $breadcrumb = Auth::instance()->getBreadcrumb();
            foreach ($breadcrumb as $k => $v) {
                $title[] = $v['title'];
            }
            $title = implode(' ', $title);
        }
        self::create([
            'title'     => $title,
            'content'   => !is_scalar($content) ? json_encode($content) : $content,
            'url'       => substr(request()->url(), 0, 1500),
            'admin_id'  => $admin_id,
            'username'  => $username,
            'useragent' => substr(request()->server('HTTP_USER_AGENT'), 0, 255),
            'ip'        => request()->ip()
        ]);
    }

    public function admin()
    {
		//belongsTo('关联模型名','外键名','关联表主键名',['模型别名定义'],'join类型');
		//如果使用关联预查询功能，对于一对一关联来说，只有一次查询，对于一对多关联的话，就可以变成2次查询，有效提高性能。
		//默认使用IN查询方式，如果需要改为JOIN查询方式，使用setEagerlyType(0)
        return $this->belongsTo('Admin', 'admin_id')->setEagerlyType(0);
    }
}
