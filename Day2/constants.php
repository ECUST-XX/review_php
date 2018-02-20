<?php
/**
 * Created by PhpStorm.
 * User: XX
 * Date: 2018/2/20
 * Time: 22:31
 */

//魔术方法
// __LINE__
//文件中的当前行号
//
//__FILE__
//文件的完整路径和文件名。如果用在被包含文件中，则返回被包含的文件名。
//
//__DIR__
//文件所在的目录。如果用在被包括文件中，则返回被包括的文件所在的目录。
//
//__FUNCTION__
//函数名称常量返回该函数被定义时的名字（区分大小写）。
//
//__CLASS__
//类的名称常量返回该类被定义时的名字（区分大小写）。
//
//__TRAIT__
//Trait 的名字常量返回 trait 被定义时的名字（区分大小写）。
//
//__METHOD__
//类的方法名返回该方法被定义时的名字（区分大小写）。
//
//__NAMESPACE__
//当前命名空间的名称（区分大小写）。此常量是在编译时定义的（PHP 5.3.0 新增）。

namespace Day2;
var_dump(__LINE__);
var_dump(__FILE__);
var_dump(__DIR__);

trait myTrait
{
    public static function traitShow()
    {
        echo "\nthis " . __CLASS__ . " trait!\n";
        //由于trait是一个语言结构不是class，
        //所以输出：this Day2\Test trait!
        var_dump(__TRAIT__);
    }
}

class Test
{
    use myTrait;

    public static function show()
    {
        var_dump(__FUNCTION__);
        var_dump(__CLASS__);
        var_dump(__METHOD__);
    }
}

Test::show();
Test::traitShow();
var_dump(__NAMESPACE__);
