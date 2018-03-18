<?php
/**
 * Created by PhpStorm.
 * User: XX
 * Date: 2018/3/18
 * Time: 19:20
 */

namespace App\Model;

// 迭代器模式
// 在不需要了解内部实现的前提下，遍历一个聚合对象的内部元素。
// 需要实现Iterator接口
class AllUsers implements \Iterator
{
    private $index;
    private $ids;
    private $data;

    public function __construct()
    {
        $db = \Ext\Database\Register::getDB('mysql');
        $result = $db->where("select id from USER ");
        // 获取从数据库中拉取的数据后格式化，但此处未实现该方法，所以手动实现模拟一下。偷懒两下
//        $this->ids = $result->fetch_all();
        $this->ids = [0,1,2,3];
        $this->data = ["pp","ll","qq","dd"];
    }

    public function next()
    {
        ++$this->index;
    }

    public function current()
    {
        return $this->data[$this->index];
    }

    public function key()
    {
        return $this->index;
    }

    public function valid()
    {
        return isset($this->data[$this->index]);
    }

    public function rewind()
    {
        $this->index = 0;
    }
}