<?php

namespace app\admin\model;

use think\Model;

class AuthGroup extends Model
{

    // 开启自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';
    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = 'updatetime';

    public function getNameAttr($value,$data)//读取器
    {
        return __($value); //获取对应语言包的值
		
    }

}
