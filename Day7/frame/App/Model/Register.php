<?php
/**
 * Created by PhpStorm.
 * User: XX
 * Date: 2018/3/18
 * Time: 14:40
 */

namespace App\Model;


class Register
{
    static protected $tree = [];

    static public function setModel($name, $obj)
    {
        self::$tree[$name] = $obj;
    }

    static public function unsetModel($name)
    {
        unset(self::$tree[$name]);
    }

    static public function getModel($name)
    {
        if (array_key_exists($name,self::$tree)){
            return self::$tree[$name];
        }
        return null;
    }
}