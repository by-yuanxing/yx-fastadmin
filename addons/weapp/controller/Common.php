<?php
/**
 * Created by PhpStorm.
 * User: 731633799@qq.com
 * Date: 2019/6/4
 * Time: 12:30
 */

namespace addons\weapp\controller;

use think\addons\Controller;
use think\Model;

class Common extends Controller
{
    protected $layout = 'default';
    protected $seo_title = '';
    protected $seo_keywords = '';
    protected $cat_info = [];
    protected $cat_id = null;
    protected $menu = [];
    protected $nav = [];

    /**
     * 首页
     */

    public function _initialize()
    {
        parent::_initialize();
        $this->cat_id = $this->request->param("cat", 0, 'int');
        $this->menu();
        $weapp = get_addon_config("weapp");
        $banner = $weapp["banner"];
        $this->assign("banner", explode(",", $banner));
        $this->assign("app", $this->app());
        $this->request->action() != "show" && $this->assign_web_info();
    }

    public function menu()
    {
        $this->nav = ["首页"];
        $controller = $this->request->controller();
        $cat = $this->cat_id;
        $menu = [
            ['url' => "weapp/index", "title" => "网站首页"],
            ['url' => "weapp/about", "title" => "关于我们"],
            [
                'url'    => "weapp/product",
                "title"  => "产品展示",
                "catkey" => "productcat_id",
                "sub"    => collection($this->product_cat())->toArray()
            ],
            [
                'url'    => "weapp/cases",
                "title"  => "案例展示",
                "catkey" => "casescat_id",
                "sub"    => collection($this->cases_cat())->toArray()
            ],
            ['url' => "weapp/brand", "title" => "品牌列表"],
            ['url' => "weapp/contact", "title" => "联系我们"],
        ];
        $menu = array_map(function ($item) use ($controller, $cat) {
            if ($item['url'] == sprintf("weapp/%s", $controller)) {
                $item['active'] = "active";
                array_push($this->nav, sprintf("<a href='%s'>%s</a>", addon_url($item['url']), $item['title']));
            } else {
                $item['active'] = "";
            }
            if (isset($item['sub'])) {
                $sub = $item['sub'];
                unset($item['sub']);
                foreach ($sub as $key => $v) {
                    $temp_sub = [
                        "url"    => addon_url($item['url'], ["cat" => $v['id']]),
                        "cat_id" => $v['id'],
                        "title"  => $v['name'],
                        "active" => ((isset($item['active']) && !empty($item['active']) && $cat == $v['id']) ? "active" : '')
                    ];
                    $item['sub'][$v['id']] = $temp_sub;
                    if (isset($temp_sub['active']) && $temp_sub['active'] == 'active') {
                        array_push($this->nav, sprintf("<a href='%s'>%s</a>", $temp_sub['url'], $temp_sub['title']));
                    }
                }
            }
            $item['url'] = addon_url($item['url']);
            if ($item['active'] == "active") {
                $this->cat_info = $item;
                $this->seo_title = $item['title'];
            }
            return $item;
        }, $menu);
        $this->menu = $menu;
        return $menu;
    }

    protected function assign_web_info()
    {
        $this->assign(
            "seo_title",
            empty($this->seo_title) ? $this->app()['title'] : $this->seo_title . "-" . $this->app()['title']
        );
        $this->menu();
        $this->assign("seo_keywords", empty($this->seo_keywords) ? $this->app()['seo_keywords'] : $this->seo_keywords);
        $this->assign("menu", $this->menu);
        $this->assign("cat_info", $this->cat_info);
        $this->assign("nav_button", implode(" > ", $this->nav));
    }

    public function app()
    {
        $site = get_addon_config("weapp");
        return [
            'title'        => $site['title'],
            "phone"        => $site['phone'],
            "address"      => $site['address'],
            "logo"         => $site['logo'],
            "icp"          => $site['icp'],
            "email"        => $site['company_email'],
            'seo_keywords' => $site['seo_keywords'],
        ];
    }

    public function product_cat()
    {
        $db = model("admin/WeappProductcat");
        $data = $db->order("weigh desc,id desc")->field("id,name")->cache(true, 24 * 60 * 60)->select();
        return $data;
    }

    public function cases_cat()
    {
        $db = model("admin/WeappCasescat");
        $data = $db->order("weigh desc,id desc")->field("id,name")->cache(true, 24 * 60 * 60)->select();
        return $data;
    }

    public function next(Model $db, $id)
    {
        $conteoller = $this->request->controller();
        $data = $db->where(['id' => ["<", $id]])->order("id desc")->find();
        return $data ? sprintf(
            " <a href='%s'>%s</a>",
            addon_url("weapp/$conteoller/show", ['id' => $data->id]),
            $data->name
        ) : "没有了";
    }

    public function pre(Model $db, $id)
    {
        $conteoller = $this->request->controller();
        $data = $db->where(['id' => [">", $id]])->order("id asc")->find();
        return $data ? sprintf(
            " <a href='%s'>%s</a>",
            addon_url("weapp/$conteoller/show", ['id' => $data->id]),
            $data->name
        ) : "没有了";
    }


    public function show()
    {
        $cat = $this->request->controller();
        $cat = ucfirst($cat);
        $db = model("admin/Weapp$cat");
        $data = $db->find($this->request->param("id"));
        if ($data && isset($this->cat_info['catkey']) && isset($data[$this->cat_info['catkey']])) {
            $this->cat_id = $data[$this->cat_info['catkey']];
            if (isset($cur_cat['sub']) && isset($cur_cat['sub'][$this->cat_id]['active'])) {
                $cur_cat['sub'][$this->cat_id]['active'] = "active";
            };
        }
        $this->seo_title = $data->name;
        $this->assign_web_info();
        $this->assign("data", $data);
        $this->assign("next", $this->next($db, $this->request->param("id")));
        $this->assign("pre", $this->pre($db, $this->request->param("id")));
        return $this->view->fetch("show/index");
    }
}
