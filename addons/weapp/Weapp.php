<?php

namespace addons\weapp;

use addons\weapp\library\Lib;
use app\common\library\Menu;
use think\Addons;

/**
 * 插件
 */
class Weapp extends Addons
{

    /**
     * 插件安装方法
     * @return bool
     */
    public function install()
    {
        $menu = [
            [
                'name' => 'weapp',
                'title' => '小程序官网',
                'icon' => 'fa fa-wechat',
                'sublist' => [
                    [
                        'name' => 'weapp/brand',
                        'title' => '品牌管理',
                        'icon' => 'fa fa-reply-all',
                        'sublist' => [
                            ['name' => 'weapp/brand/index', 'title' => '查看'],
                            ['name' => 'weapp/brand/add', 'title' => '添加'],
                            ['name' => 'weapp/brand/edit', 'title' => '修改'],
                            ['name' => 'weapp/brand/del', 'title' => '删除'],
                            ['name' => 'weapp/brand/multi', 'title' => '批量更新'],
                        ]
                    ],
                    [
                        'name' => 'weapp/about/edit/ids/1',
                        'title' => '关于公司',
                        'icon' => 'fa fa-cog',
                        'sublist' => [
                            ['name' => 'weapp/about/index', 'title' => '查看'],
                            ['name' => 'weapp/about/add', 'title' => '添加'],
                            ['name' => 'weapp/about/edit', 'title' => '修改'],
                            ['name' => 'weapp/about/del', 'title' => '删除'],
                            ['name' => 'weapp/about/multi', 'title' => '批量更新'],
                        ]
                    ]
                    ,
                    [
                        'name' => 'weapp/product',
                        'title' => '产品列表',
                        'icon' => 'fa fa-cog',
                        'sublist' => [
                            ['name' => 'weapp/product/index', 'title' => '查看'],
                            ['name' => 'weapp/product/add', 'title' => '添加'],
                            ['name' => 'weapp/product/edit', 'title' => '修改'],
                            ['name' => 'weapp/product/del', 'title' => '删除'],
                            ['name' => 'weapp/product/multi', 'title' => '批量更新'],
                        ]
                    ]
                    ,
                    [
                        'name' => 'weapp/productcat',
                        'title' => '产品分类',
                        'icon' => 'fa fa-cog',
                        'sublist' => [
                            ['name' => 'weapp/productcat/index', 'title' => '查看'],
                            ['name' => 'weapp/productcat/add', 'title' => '添加'],
                            ['name' => 'weapp/productcat/edit', 'title' => '修改'],
                            ['name' => 'weapp/productcat/del', 'title' => '删除'],
                            ['name' => 'weapp/productcat/multi', 'title' => '批量更新'],
                        ]
                    ],
                    [
                        'name' => 'weapp/cases',
                        'title' => '案例列表',
                        'icon' => 'fa fa-cog',
                        'sublist' => [
                            ['name' => 'weapp/cases/index', 'title' => '查看'],
                            ['name' => 'weapp/cases/add', 'title' => '添加'],
                            ['name' => 'weapp/cases/edit', 'title' => '修改'],
                            ['name' => 'weapp/cases/del', 'title' => '删除'],
                            ['name' => 'weapp/cases/multi', 'title' => '批量更新'],
                        ]
                    ],
                    [
                        'name' => 'weapp/casescat',
                        'title' => '案例分类',
                        'icon' => 'fa fa-cog',
                        'sublist' => [
                            ['name' => 'weapp/casescat/index', 'title' => '查看'],
                            ['name' => 'weapp/casescat/add', 'title' => '添加'],
                            ['name' => 'weapp/casescat/edit', 'title' => '修改'],
                            ['name' => 'weapp/casescat/del', 'title' => '删除'],
                            ['name' => 'weapp/casescat/multi', 'title' => '批量更新'],
                        ]
                    ],
                    [
                        'name' => 'weapp/guest',
                        'title' => '用户留言',
                        'icon' => 'fa fa-cog',
                        'sublist' => [
                            ['name' => 'weapp/guest/index', 'title' => '查看'],
                            ['name' => 'weapp/guest/add', 'title' => '添加'],
                            ['name' => 'weapp/guest/edit', 'title' => '修改'],
                            ['name' => 'weapp/guest/del', 'title' => '删除'],
                            ['name' => 'weapp/guest/multi', 'title' => '批量更新'],
                        ]
                    ],
                    [
                        'name' => 'weapp/down',
                        'title' => '模板下载',
                        'icon' => 'fa fa-cog',
                        'sublist' => [
                            ['name' => 'weapp/down/index', 'title' => '查看'],
                        ]
                    ]
                ]
            ]
        ];

        Menu::create($menu);
        Lib::install_init();
        return true;
    }

    /**
     * 插件卸载方法
     * @return bool
     */
    public function uninstall()
    {
        Menu::delete('weapp');
        return true;
    }

    /**
     * 插件启用方法
     * @return bool
     */
    public function enable()
    {
        Menu::enable('weapp');
        Lib::setConf();
        return true;
    }

    /**
     * 插件禁用方法
     * @return bool
     */
    public function disable()
    {
        Menu::disable('weapp');
        return true;
    }
}
