<?php

return array (
  'autoload' => false,
  'hooks' => 
  array (
    'app_init' => 
    array (
      0 => 'banip',
      1 => 'cms',
      2 => 'epay',
    ),
    'view_filter' => 
    array (
      0 => 'cms',
    ),
    'user_sidenav_after' => 
    array (
      0 => 'cms',
    ),
    'xunsearch_config_init' => 
    array (
      0 => 'cms',
    ),
    'xunsearch_index_reset' => 
    array (
      0 => 'cms',
    ),
    'testhook' => 
    array (
      0 => 'mydemo',
    ),
    'config_init' => 
    array (
      0 => 'third',
    ),
  ),
  'route' => 
  array (
    '/cms/$' => 'cms/index/index',
    '/cms/t/[:name]$' => 'cms/tags/index',
    '/cms/p/[:diyname]$' => 'cms/page/index',
    '/cms/s$' => 'cms/search/index',
    '/cms/d/[:diyname]' => 'cms/diyform/index',
    '/cms/special/[:diyname]' => 'cms/special/index',
    '/cms/a/[:diyname]$' => 'cms/archives/index',
    '/cms/c/[:diyname]$' => 'cms/channel/index',
    '/u/[:id]' => 'cms/user/index',
    '/example$' => 'example/index/index',
    '/example/d/[:name]' => 'example/demo/index',
    '/example/d1/[:name]' => 'example/demo/demo1',
    '/example/d2/[:name]' => 'example/demo/demo2',
    '/mydemo/$' => 'mydemo/index/index',
    '/third$' => 'third/index/index',
    '/third/connect/[:platform]' => 'third/index/connect',
    '/third/callback/[:platform]' => 'third/index/callback',
    '/third/bind/[:platform]' => 'third/index/bind',
    '/third/unbind/[:platform]' => 'third/index/unbind',
    '/weapp/$' => 'weapp/index/index',
  ),
);