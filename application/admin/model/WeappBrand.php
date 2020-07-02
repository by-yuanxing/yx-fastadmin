<?php

namespace app\admin\model;

use think\Model;
use app\admin\library\Auth;

class WeappBrand extends Model
{
    // 表名
    protected $name = 'weapp_brand';

    // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';

    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = 'updatetime';

    // 追加属性
    protected $append = [
        'push_text'
    ];


    protected static function init()
    {
        self::beforeInsert(function (&$row) {
            $row->createby = Auth::instance()->id;
        });

        self::afterInsert(function ($row) {
            $pk = $row->getPk();
            $row->getQuery()->where($pk, $row[$pk])->update(['weigh' => $row[$pk]]);
        });
    }


    public function getPushList()
    {
        return ['1' => __('Push 1'), '0' => __('Push 0')];
    }


    public function getPushTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['push']) ? $data['push'] : '');
        $list = $this->getPushList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function admin()
    {
        return $this->belongsTo('Admin', 'createby', 'id', [], 'LEFT')->setEagerlyType(0);
    }
}
