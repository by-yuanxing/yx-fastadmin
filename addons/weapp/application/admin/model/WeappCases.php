<?php

namespace app\admin\model;

use think\Model;

class WeappCases extends Model
{
    // 表名
    protected $name = 'weapp_cases';

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


    public function casescat()
    {
        return $this->belongsTo('WeappCasescat', 'casescat_id', 'id', [], 'LEFT')->setEagerlyType(0);
    }
}
