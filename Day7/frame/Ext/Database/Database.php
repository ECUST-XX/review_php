<?php
/**
 * Created by PhpStorm.
 * User: XX
 * Date: 2018/3/17
 * Time: 17:23
 */

namespace Ext\Database;


use Ext\Database\Register;
use Ext\Mysql\Mysql;

class Database
{
    public function database()
    {
        echo __METHOD__;
    }

    // 工厂模式
    // 避免到处创建对象造成的修改困难，修改时方便统一管理。是其他设计模式的基础
    public function getMysql()
    {
        $mysql = Mysql::getInstance();
        Register::setDB("mysql", $mysql);
        return $mysql;
    }
}