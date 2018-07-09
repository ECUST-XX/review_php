<?php
// 类型部分

// 介绍
/**
 * php的10种基本类型
 */
// 英文文档：增加了新的iterable复合类型

// Boolean 布尔类型
/**
 * 布尔类型
当转换为 boolean 时，以下值被认为是 FALSE：

布尔值 FALSE 本身
整型值 0（零）
浮点型值 0.0（零）
空字符串，以及字符串 "0"
不包括任何元素的数组
特殊类型 NULL（包括尚未赋值的变量）
从空标记生成的 SimpleXML 对象
 */

// Integer 整型
/**
 * 整型，支持十进制，十六进制，八进制或二进制的表示
$a = 1234; // 十进制数
$a = -123; // 负数
$a = 0123; // 八进制数 (等于十进制 83)
$a = 0x1A; // 十六进制数 (等于十进制 26)
$a = 0b11111111; // 二进制数字 (等于十进制 255)

PHP 不支持无符号的 integer

绝不要将未知的分数强制转换为 integer，这样有时会导致不可预料的结果。
echo (int) ( (0.1+0.7) * 10 ); // 显示 7，不转换时为8
 */

// Float 浮点型
/**
 * 浮点型，通常使用双精度格式
不要相信浮点数结果精确到了最后一位，不要比较两个浮点数是否相等。
高精度应该使用任意精度数学函数或者 gmp 函数。

迂回的方法来比较浮点数值
$a = 1.23456789;
$b = 1.23456780;
$epsilon = 0.00001;

if(abs($a-$b) < $epsilon) {
echo "true";
}

应当使用is_nan()来检查NAN。任何拿NAN与其它任何值（除了 TRUE）进行的松散或严格比较的结果都是 FALSE。
 */

// String 字符串
/**
 * 字符串，四种表达：单引号，双引号，heredoc 语法结构，nowdoc 语法结构
nowdoc与heredoc类似，但nowdoc不转义且需要单引号区分heredoc
$nowdoc = <<<'EOT'
nowdoc
EOT;

复杂（花括号）语法
$great = 'fantastic';
$name = 'great';
echo "This is the value of the var named $name: {${$name}}";

PHP 的字符串在内部是字节组成的数组。因此用花括号访问或修改字符串对多字节字符集很不安全。

字符串转数字
$foo = 1 + "10.5";                // $foo is float (11.5)
$foo = 1 + "-1.3e3";              // $foo is float (-1299)
$foo = 1 + "bob-1.3e3";           // $foo is integer (1)
$foo = 1 + "bob3";                // $foo is integer (1)
$foo = 1 + "10 Small Pigs";       // $foo is integer (11)
$foo = 4 + "10.2 Little Piggies"; // $foo is float (14.2)
$foo = "10.0 pigs " + 1;          // $foo is float (11)
$foo = "10.0 pigs " + 1.0;        // $foo is float (11)

php7.1.0后允许负数下标
$name = 'great';
echo $name{-1},$name[-1];
 */
// 英文文档：增加了7.1.0对字符串负数下标的使用说明，删除了4.0版本Object转String的说明

// Array 数组
/**
 * 数组
类型强制与覆盖
包含有合法整型值的字符串会被转换为整型。例如键名 "8" 实际会被储存为 8。但是 "08" 则不会强制转换，因为其不是一个合法的十进制数值。
浮点数也会被转换为整型，意味着其小数部分会被舍去。例如键名 8.7 实际会被储存为 8。
布尔值也会被转换成整型。即键名 true 实际会被储存为 1 而键名 false 会被储存为 0。
Null 会被转换为空字符串，即键名 null 实际会被储存为 ""。
数组和对象不能被用为键名。坚持这么做会导致警告：Illegal offset type。
$array = array(
1    => "a",
"1"  => "b",
1.5  => "c",
true => "d",
);
var_dump($array);
输出：
array(1) {
[1]=>
string(1) "d"
}

PHP 实际并不区分索引数组和关联数组
key 为可选项。如果未指定，PHP 将自动使用之前用过的最大 integer 键名加上 1 作为新的键名。
$array = array(
"a",
"b",
6 => "c",
"d",
);
var_dump($array);
输出：
array(4) {
[0]=>
string(1) "a"
[1]=>
string(1) "b"
[6]=>
string(1) "c"
[7]=>
string(1) "d"
}

方括号和花括号可以互换使用来访问数组单元  $array[42] 和 $array{42} 效果相同

自 PHP 5.4 起可以用直接对函数或方法调用的结果进行数组解引用，在此之前只能通过一个临时变量。
自 PHP 5.5 起可以直接对一个数组原型进行数组解引用。
function getArray() {
return array(1, 2, 3);
}
// on PHP 5.4
$secondElement1 = getArray()[1];
// previously
$tmp = getArray();
$secondElement2 = $tmp[1];
// or
list(, $secondElement3) = getArray();
var_dump($secondElement1,$secondElement2,$secondElement3);
 */
// 英文文档：删除中文文档中“如果对给出的值没有指定键名，则取当前最大的整数索引值，而新的键名将是该值加一。如果指定的键名已经有了值，则该值会被覆盖。”的原文
// 增加 Array dereferencing a scalar value which is not a string silently yields NULL, i.e. without issuing an error message.
// （取消引用标量值的数组默认产生NULL的功能，即不发出错误消息。）TODO: 没读懂是什么意思
// 增加 从PHP 7.1.0开始，对字符串应用空索引运算符会引发致命错误。此前，字符串被静默转换为数组。
// 例如：$str = "qwer";
//      $str[2]=null;
//      echo $str;

// Iterables 可迭代类型
/**
 * 新增加的类型
var_dump(is_iterable([1, 2, 3])); // bool(true)
var_dump(is_iterable(new ArrayIterator([1, 2, 3]))); // bool(true)
var_dump(is_iterable((function () { yield 1; })())); // bool(true)
var_dump(is_iterable(1)); // bool(false)
var_dump(is_iterable(new stdClass())); // bool(false)
 */
// 英文文档：新增文档

// Object 对象
// 英文文档：增加7.2.0支持：当 array 转换成 object 将使键名成为属性名并具有相对应的值，数字键也可以被直接访问。
// 修改7.2.0例子输出结果
// $obj = (object) array('1' => 'foo');
// var_dump(isset($obj->{'1'})); // 7.2.0输出 true 1，之前版本输出false 1
// var_dump(key($obj));

// Resource 资源类型

// NULL
// 英文文档：增加7.2.0说明：弃用 转换到 NULL
// (unset) $var //弃用

// Callback / Callable
/**
 * 可回调类型
$double = function($a) {
    return $a * 2;
};
// This is our range of numbers
$numbers = range(1, 5);
$new_numbers = array_map($double, $numbers);
print implode(' ', $new_numbers);
 */

// 文档中使用的伪类型与变量

// 类型转换的判别
/**
 * 允许的强制转换
(int), (integer) - 转换为整形 integer
(bool), (boolean) - 转换为布尔类型 boolean
(float), (double), (real) - 转换为浮点型 float
(string) - 转换为字符串 string
(array) - 转换为数组 array
(object) - 转换为对象 object
(unset) - 转换为 NULL (PHP 7.2中废弃，8.0.0中删除)
 */









