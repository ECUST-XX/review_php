<?php
/**
 * Created by PhpStorm.
 * User: XX
 * Date: 2018/3/17
 * Time: 20:46
 */

namespace Ext\Database;


class Register
{

    // 注册树模式
    // 避免创建对象时使用工厂或单例方法创建，而是统一使用register调用
    static protected $tree = [];

    static public function setDB($name, $obj)
    {
        self::$tree[$name] = $obj;
    }

    static public function unsetDB($name)
    {
        unset(self::$tree[$name]);
    }

    static public function getDB($name)
    {
        return self::$tree[$name];
    }
}