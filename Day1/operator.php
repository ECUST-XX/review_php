<?php
/**
 * Created by PhpStorm.
 * User: XX
 * Date: 2018/2/19
 * Time: 15:34
 */

// 括号>单目运算符>双目运算符>三目运算符>等号
// ||运算符前半部分为true则后面不再计算 true++依然为true(bool)
var_dump(1 <= -1 == 1);

echo true ? 0 : true ? 1 : 2; // (true ? 0 : true) ? 1 : 2 = 2
echo "\n";

$x = 2;
echo $x == 2 ? '我' : $x == 1 ? '你' : '它'; //你  ($x == 2 ? '我' : ($x == 1))? '你' : '它'
echo "\n";


// ||运算符前半部分为true则后面不再计算 true++依然为true(bool)
$a = 3;
$b = 5;
if ($a = 3 || $b = 7) {    //$a = (3 || $b = 7)
    $a++;
    $b++;
}
echo "a=$a  b=$b";
echo "\n";
var_dump($a);


// b=a++与b=++a 区别：谁在前先算谁
$a = $b = 1;
echo $a + ++$a; // 4  2+2
echo $b + $b++; // 3  应该是 2+1 而不是 1+2