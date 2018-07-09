<?php
// 简介
/**
 * 除了常见的{}划分逻辑块，还有shell风格的:划分方法。例如
while ($i <= 10):
endwhile;

if ($a > $b):
echo $a." is greater than ".$b;
elseif ($a == $b):
echo $a." equals ".$b;
else:
echo $a." is to ".$b;
endif;

避免重复计算固定的数组长度
for($i = 0, $size = count($people); $i < $size; ++$i)
{
$people[$i]['salt'] = rand(000000, 999999);
}
 */

// foreach
// 英文文档：由于foreach依赖于PHP 5中的内部数组指针，在循环中修改其值将可能导致意外的行为。在PHP 7中，foreach不使用内部数组指针。
// 新增了一个由于引用未释放产生异常的案例，建议引用使用完成后unset掉。

// continue
// 英文文档：增加5.4.0的一个错误提示

// switch/case
/**
 * switch/case 作的是松散比较。

允许使用分号代替 case 语句后的冒号。
switch($beer)
{
case 'tuborg';
case 'carlsberg';
case 'heineken';
echo 'Good choice';
break;
default;
echo 'Please make a new selection...';
break;
}
 */

// declare
// TODO: 没看懂什么意思

// return
/**
如果当前脚本是被 include 的，则 return 的值会被当作 include 调用的返回值
 */









