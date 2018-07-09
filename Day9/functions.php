<?php
// 函数的参数
/**
5.3起支持类型声明

5.6起支持可变数量的参数列表
function sum(...$numbers) {
$acc = 0;
foreach ($numbers as $n) {
$acc += $n;
}
return $acc;
}

echo sum(1, 2, 3, 4);
 */
// 英文文档：增加iterable与object的类型声明支持

// 返回值
/**
 * 7.0版本增加返回类型支持，严格模式下可能会报错
declare(strict_types=1);

function sum($a, $b): int {
return $a + $b;
}

var_dump(sum(1, 2));
//var_dump(sum(1, 2.5)); //报错
 */

// 可变函数

/**
7.0版本后允许ClassName::methodName作为变量函数。
class Foo
{
static function bar()
{
echo "bar\n";
}
function baz()
{
echo "baz\n";
}
}

$func = array("Foo", "bar");
$func(); // prints "bar"
$func = array(new Foo, "baz");
$func(); // prints "baz"
$func = "Foo::bar";
$func();
 */

// 匿名函数

