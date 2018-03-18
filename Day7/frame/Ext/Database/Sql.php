<?php
/**
 * Created by PhpStorm.
 * User: XX
 * Date: 2018/3/17
 * Time: 21:30
 */

namespace Ext\Database;

interface Sql
{
    // 适配器模式
    // 定义统一的接口进行继承实现，多用在数据库中
    public function sqlName();
    static function connect();
    function close();
}