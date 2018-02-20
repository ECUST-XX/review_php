<?php
/**
 * Created by PhpStorm.
 * User: XX
 * Date: 2018/2/19
 * Time: 23:27
 */

// 正则表达式
// POSIX 7.0已经弃用，推荐使用 PCRE
// 可视化正则表达式：https://regexper.com/
// 速查表：http://tool.oschina.net/uploads/apidocs/jquery/regexp.html
// 教程：http://www.runoob.com/regexp/regexp-syntax.html

//TODO 复习一下，写几个实例

$str = '/filename.ext/12';
$isMatched = preg_match('/filename\.ext/', $str, $matches);
var_dump($isMatched, $matches);

