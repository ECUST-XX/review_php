<?php
/**
 * Created by PhpStorm.
 * User: XX
 * Date: 2018/3/17
 * Time: 17:25
 */

class Autoload
{

    static function load($class)
    {
        require BASE . "/" . $class . ".php";
    }
}
