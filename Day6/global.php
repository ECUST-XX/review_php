<?php
/**
 * Created by PhpStorm.
 * User: XX
 * Date: 2018/3/11
 * Time: 15:26
 */

//global 相当于引用一个同名全局变量进来或创建一个新的全局变量,但若传入引用则有会不同结果

$globalStr = '.net';
function globalTest()
{

    global $globalStrs;

    $globalStrs = 'jb51' . $globalStrs;

    unset($globalStr);

}

globalTest();

echo $globalStr; //输出 .net

echo $globalStrs; //输出 jb51

echo "\n---------\n";
$globalStr = '.net';
function globalTest2()
{

    global $globalStr;

    $globalStr = 'jb51' . $globalStr;

    unset($globalStr);

}

globalTest2();

echo $globalStr; //输出 jb51.net


echo "\n---------\n";
$A="Hello";
function print_A() {
$A= "php mysql !!";
global $A;
echo $A;
}
echo$A;
print_A();
echo $A;


echo "\n---------\n";
$var1 = 1;
$var2 = 2;
function test()
{
    global $var1, $var2; // 作用范围在函数体内
    $var1 = 3;
    echo $var2, $var1;
}

test();
echo $var1, $var2; //输出 32


echo "\n---------\n";
$var1 = 1;
$var2 = 2;
function test2()
{
    global $var1, $var2;
    $var1 = &$var2;
    echo $var1, $var2; //输出 22
}

test2();
echo $var1, $var2; //输出 12


echo "\n---------\n";
$var1 = 1;
$var2 = 2;
function test_global()
{
    global $var1, $var2;
    $var1 = &$var2;
    $var1 = 7;
    echo $var1, $var2; //输出 77
}

test_global();
echo $var1;
echo $var2; //输出 17
