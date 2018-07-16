<?php
// 引用做什么
// 英文文档：删除 4.0文档
// 增加 简介
// 增加 7.0废弃new对象时使用=&
// 增加 数组元素引用示例
// 数组的引用行为是逐个元素定义的;
// 各个元素的引用行为与数组容器的引用状态分离。

// 引用传递
/**
函数调用时没有引用符号，只有函数定义中有
 */

// 引用返回
/**
 * 不要用返回引用来增加性能，引擎足够聪明来自己进行优化

class foo {
public $value = 42;
public function &getValue() {
$a = $this->value;
return $a;
}
}

$obj = new foo;
$myValue = &$obj->getValue();
echo $myValue;
$obj->value = 2;
echo $myValue;
 */
// 英文文档：增加 两个示例

// 取消引用
/**
当 unset 一个引用，只是断开了变量名和变量内容之间的绑定。这并不意味着变量内容被销毁了

$a = 1;
$b =& $a;
unset($a);
 */





