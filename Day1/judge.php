<?php
/**
 * Created by PhpStorm.
 * User: XX
 * Date: 2018/2/19
 * Time: 12:19
 */
// 全类型比较表 http://php.net/manual/zh/types.comparisons.php
// 	注意这三个的区别：empty()	is_null() isset()
// empty()判断一个变量是否被认为是空的。当一个变量并不存在，或者它的值等同于FALSE，那么它会被认为不存在。
// 如果变量不存在的话，empty()并不会产生警告。
/**
以下的东西被认为是空的：
"" (空字符串)
0 (作为整数的0)
0.0 (作为浮点数的0)
"0" (作为字符串的0)
NULL
FALSE
array() (一个空数组)
$var; (一个声明了，但是没有值的变量)
*/
$x = false;
$y = true;
echo "empty(false):" . empty($x) . " empty(true):" . empty($y) . " empty(0):" . empty(0) . "\n";

$foo = 10;            // $foo 是一个整数
$str = "$foo";        // $str 是一个字符串
$fst = (string)$foo; // $fst 也是一个字符串

// ===判断类型
if ($fst === $str) {
    echo "===判断类型：" . '$fst' . " === " . '$str' . "\n";
}
// ==不判断类型
if ($fst == $foo) {
    echo "==不判断类型：" . '$fst' . " == " . '$foo' . "\n";
}

// 精确计算时使用自带的bc扩展或者安装使用gmp扩展
$a = 1.234;
$b = 5;
echo bcadd($a, $b);     // 6
echo "\n";
echo bcadd($a, $b, 4);  // 6.2340
//$sum = gmp_add("123456789012345", "76543210987655");
