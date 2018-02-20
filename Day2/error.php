<?php
/**
 * Created by PhpStorm.
 * User: XX
 * Date: 2018/2/20
 * Time: 19:58
 */

// php异常处理
// PHP 7 改变了大多数错误的报告方式。不同于传统（PHP 5）的错误报告机制，现在大多数错误被作为 Error 异常抛出。
// 一篇翻译的文章：https://novnan.github.io/PHP/throwable-exceptions-and-errors-in-php7/


// php错误预定义常量(级别)：http://php.net/manual/zh/errorfunc.constants.php


// PHP 支持一个错误控制运算符：@。当将其放置在一个 PHP 表达式之前，该表达式可能产生的任何错误信息都被忽略掉。

// @ 运算符只对表达式有效。对新手来说一个简单的规则就是：如果能从某处得到值，就能在它前面加上 @ 运算符。例如，
// 可以把它放在变量，函数和 include 调用，常量，等等之前。不能把它放在函数或类的定义之前，也不能用于条件结构例如
// if 和 foreach 等。

// 目前的“@”错误控制运算符前缀甚至使导致脚本终止的严重错误的错误报告也失效。
// 这意味着如果在某个不存在或者敲错了字母的函数调用前用了“@”来抑制错误信息，那脚本会没有任何迹象显示原因而死在那里。


/**
 * php7官方文档给出的Error层次结构
 * http://php.net/manual/zh/language.errors.php7.php
 * Throwable
 *      Error
 *          ArithmeticError
 *              DivisionByZeroError
 *
 *          AssertionError
 *          ParseError
 *          TypeError
 *      Exception
 *          ...
 */

try {
    throw new Error("\nphp7 use Error!\n");
//    @$a = 1 / 0; // 不会捕捉到异常
//    echo $a; // 输出为 INF (无穷)
} catch (Error $error) {
    echo $error->getMessage();
    error_log("stop!!! in the window\n");
} finally {
    error_log(time() . " stop!!! in the file\n", 3, "./err.log");

}

