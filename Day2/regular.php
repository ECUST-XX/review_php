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

// 在linux下grep也可使用正则表达式，但需要考虑转义问题例如'k\{2\}'与'kp\?'其中?与{}都需要转义
// 常用规则 ^ $ . * ? [] {,} \ () |(“(z|f)ood”匹配“zood”或“food”) +(等价于{1,})
// 部分转义 \b(单词边界) \n \s(匹配任何空白字符，包括空格、制表符、换页符等等。等价于[ \f\n\r\t\v]。)

$str = '/filename.ext/12';
$isMatched = preg_match('/filename\.ext/', $str, $matches);
var_dump($isMatched, $matches);

