<?php
/**
 * Created by PhpStorm.
 * User: XX
 * Date: 2018/2/20
 * Time: 22:35
 */

// 生成器yield
// 官方文档：yield用法 http://php.net/manual/zh/language.generators.syntax.php
// 官方文档：generator类 http://php.net/manual/zh/class.generator.php
// yield应用：laravel中间件(管道模式) http://blog.csdn.net/qq_20329253/article/details/52202811
// 鸟哥blog：协程 http://www.laruence.com/2015/05/28/3038.html
// 生成器提供了一种更容易的方法来实现简单的对象迭代，相比较定义类实现 Iterator 接口的方式，性能开销和复杂性大大降低。

// 生成器函数的核心是yield关键字。它最简单的调用形式看起来像一个return申明，不同之处在于普通return会返回值并终止函数的执行，
// 而yield会返回一个值给循环调用此生成器的代码并且只是暂停执行生成器函数。


function xrange($start, $limit, $step = 1)
{
    if ($start < $limit) {
        if ($step <= 0) {
            throw new LogicException('Step must be +ve');
        }

        for ($i = $start; $i <= $limit; $i += $step) {
            yield $i;
        }
    } else {
        if ($step >= 0) {
            throw new LogicException('Step must be -ve');
        }

        for ($i = $start; $i >= $limit; $i += $step) {
            yield $i;
        }
    }
}

$x = xrange(0, 10, 1); // 返回一个Generator对象
var_dump($x);

foreach ($x as $k => $v) {
    echo $k, "\t", $v, "- \n";
}
echo "\n-------\n";
function gen_one_to_three()
{
    for ($i = 1; $i <= 3; $i++) {
        //注意变量$i的值在不同的yield之间是保持传递的。
        yield $i => $i;
    }
}

$generator = gen_one_to_three();
foreach ($generator as $key => $value) {
    echo "$key => $value\n";
}


// yield高级用法：协程(双向通信)
$ben = call_user_func(function () {
    $hello = (yield 'my name is ben ,what\'s your name' . PHP_EOL);
    echo $hello;
});

$sayHello = $ben->current();
echo $sayHello;
echo "-----\n";
$ben->send('hi ben ,my name is alex');
echo "\n+++++\n";

$Generatorg = call_user_func(function () {
    $hello = (yield '[yield] say hello' . PHP_EOL);
    echo $hello . PHP_EOL;
    try {
        $jump = (yield '[yield] I jump,you jump' . PHP_EOL);
    } catch (Exception $e) {
        echo '[Exception]' . $e->getMessage() . PHP_EOL;
    }
});

$hello = $Generatorg->current();
echo $hello;
$jump = $Generatorg->send('[main] say hello');
echo $jump;
$Generatorg->throw(new Exception('[main] No,I can\'t jump'));