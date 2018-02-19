<?php
/**
 * Created by PhpStorm.
 * User: XX
 * Date: 2018/2/19
 * Time: 11:46
 */
// php中没有了c中地址的概念
$param2 = 18;               //定义变量2
$param1 = &$param2;      //将变量2的引用传给变量1
$param3 = &$param2;
echo $param2;            //显示为1
echo $param1;
echo $param3;
echo "\n";
$param1 = 2;             //把2赋值给变量1
$param2 = 3;
echo $param2;
echo $param1;
echo $param3;

// unset问题
echo "\nvalue unset():\n";
$a = 13;
$b = &$a;
unset($a);
//echo $a; // PHP Notice:  Undefined variable: a
echo $b; // 13

// 对象的销毁：
// 显试销毁: 当对象没有被引用时就会被销毁,所以我们可以unset或为其赋值NULL;
// 隐试销毁:PHP是脚本语言,在代码执行完最后一行时,所有申请的内存都要释放掉.

echo "\nclass unset():\n";
class Human {
    public $name = '张三';
    public $gender = 99;
    public function __destruct() {
        echo '死了!';
    }
}
$a1 = new Human();
$a3 = $a2 = $a1;
unset($a1);
echo $a2->name;
echo $a3->gender;
echo "\n";  //析构函数究竟是触发了几次,是在线上触发,还是在线下触发?
            //对象传值为传引用
            //$a3 = $a2 = $a1;
            //默认引用传值,四个变量指向同一处内存，unset的时候对象还是被还是其它三个变量使用，
            //所以对象并没有被销毁，所以析构函数是在线下触发的（代码执行完了，内存自动释放）
// 加入下列代码后 Human() 被创建两次，故会输出两次 “死了！”
echo "new Human()\n";
$e = $f = $g = new Human();
unset($e);
unset($f);
unset($g);
