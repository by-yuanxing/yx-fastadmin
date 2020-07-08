<?php

namespace addons\third\library;


/**
 *  修改Date:2020.7.8
 */
class Application
{

    /**
     * 配置信息
     * @var array
     */
    private $config = [];

    /**
     * 服务提供者
     * @var array
     */
    private $providers = [
        'qq'      => 'Qq',
        'weibo'   => 'Weibo',
        'wechat'  => 'Wechat',
    ];

    /**
     * 服务对象信息
     * @var array
     */
    protected $services = [];

    public function __construct($options = [])
    {
        $options = array_intersect_key($options, $this->providers);//array_intersect_key() 函数用于比较两个（或更多个）数组的键名 ，并返回交集。
		//dump($options);
        $options = array_merge($this->config, is_array($options) ? $options : []);//array_merge() 函数把一个或多个数组合并为一个数组。
		//dump($options);
        foreach ($options as $key => &$option) {
			
            $option['app_id'] = isset($option['app_id']) ? $option['app_id'] : '';
            $option['app_secret'] = isset($option['app_secret']) ? $option['app_secret'] : '';
			
            // 如果未定义回调地址则自动生成
            $option['callback'] = isset($option['callback']) && $option['callback'] ? $option['callback'] : addon_url('third/index/callback', [':platform' => $key], false, true);
        }
        $this->config = $options;
		//dump($this->config);
		
        //注册服务器提供者
        $this->registerProviders();//
		
	
    }

    /**
     * 注册服务提供者
     */
    private function registerProviders()
    {
        foreach ($this->providers as $k => $v) {
            $this->services[$k] = function () use ($k, $v) {
                $options = $this->config[$k];
                $objname = __NAMESPACE__ . "\\{$v}";
                return new $objname($options);
            };
        }
    }

    public function __set($key, $value)
    {
        $this->services[$key] = $value;
    }

    public function __get($key)
    {
        return isset($this->services[$key]) ? $this->services[$key]($this) : null;
    }
}
