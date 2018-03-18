<?php
/**
 * Created by PhpStorm.
 * User: XX
 * Date: 2018/3/17
 * Time: 20:38
 */

namespace Ext\Mysql;


use Ext\Database\Sql;

class Mysql implements Sql
{
    protected static $db;

    // 单例模式
    // 避免浪费资源
    private function __construct()
    {
        return;
    }

    static public function getInstance()
    {
        if (self::$db) {
            echo "------\n";
            return self::$db;
        } else {
            self::$db = new self();
            echo "+++++++\n";
            return self::$db;
        }
    }

    // 链式操作的实现: 返回 $this
    public function where($where)
    {
        echo $where;
        return $this;
    }

    public function limit($limit)
    {
        echo $limit;
        return $this;
    }

    public function order($order)
    {
        echo $order;
        return $this;
    }

    // 实现接口时可以使用final参数，但在接口上不能定义，public属性在定义或实现时可以省略
    // static属性需要在定义与实现要一致，否则不能添加或省略，protected与private不可以被定义
    public function sqlName()
    {
        return "MYSQL";
    }

    static public function connect()
    {
        echo __METHOD__, "\n";
    }

    final function close()
    {
        echo __METHOD__, "\n";
    }
}