<?php
// 基础
/**
 * 中文与其他语言字符貌似并不能用作变量名正常使用
 */

// 预定义变量

// 变量范围
// 英文文档：增加5.6 静态变量赋值，可以是表达式的结果，但是不能使用任何函数
// static $int = 0;          // correct
// static $int = 1+2;        // correct (as of PHP 5.6)
// //    static $int = sqrt(121);  // wrong  (as it is an expression too)

// 可变变量
/**
 * 可变变量的使用
class foo {
var $bar = 'I am bar.';
var $arr = array('I am A.', 'I am B.', 'I am C.');
var $r   = 'I am r.';
}
$foo = new foo();
$bar = 'bar';
$baz = array('foo', 'bar', 'baz', 'quux');
echo $foo->$bar . "\n";
echo $foo->{$baz[1]} . "\n";

$start = 'b';
$end   = 'ar';
echo $foo->{$start . $end} . "\n";

$arr = 'arr';
echo $foo->{$arr[1]} . "\n";
echo ($foo->{$arr})[1] . "\n";
 */
// 英文文档：增加7.0 关于如何放置花括号以避免歧义，修改部分实例

// 来自 PHP 之外的变量
/**
 * 从PHP 5.4.0开始，只有两种方法可以从HTML表单中访问数据。$_POST['username'] $_REQUEST['username']
变量名中的点和空格将转换为下划线。
<input name =“a.b”/>变为$ _REQUEST [“a_b”]。
 */
// 英文文档：删除4.0文档




