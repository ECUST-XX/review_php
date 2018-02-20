<?php
/**
 * Created by PhpStorm.
 * User: XX
 * Date: 2018/2/19
 * Time: 21:36
 */

// php面向对象
// 基础教程：http://www.runoob.com/php/php-oop.html
// 经验之谈：https://segmentfault.com/a/1190000004067581 (由于文章发布较早，结尾处对oop理解稍有偏差)
// 官方文档：http://php.net/manual/zh/language.oop5.php
// oop五大原则S.O.L.I.D：http://blog.jobbole.com/86267/ (一篇翻译过来的文章，通俗易懂)
// php对多态的支持与java和c++不太相同，php不能定义同名方法但参数不同的方法


// 结合laravel框架讲述了37种设计模式：http://laravelacademy.org/resources/design-patterns (现在忘得差不多了)
// 韩天峰的php十一种设计模式：http://ilvsx.github.io/notes/2016/07/20/learn-design-pattern/ (有视频)

// 魔术方法
// __construct()， __destruct()， __call()， __callStatic()， __get()，
// __set()， __isset()，__unset()， __sleep()，__wakeup()， __toString()，
// __invoke()， __set_state()， __clone(), __debugInfo()
// 实例教程：https://segmentfault.com/a/1190000007250604 (__autoload()将在7.2中遗弃)




// spl_autoload_register 的使用
/*
//文件 autoloadClass.php ,需要new的文件
class AutoloadClass{

    public function __construct()
    {
        echo '你已经包含我了';
    }
}

//文件autoloadDemo.php文件
spl_autoload_register('myAutoLoad', true, true);
function myAutoLoad($className){
    echo "所有的包含文件工作都交给我！\r\n";
    $classFileName = "./{$className}.php";
    echo "我来包含！{$classFileName}\r\n";
    include "./{$className}.php";
}
$objDemo = new AutoloadClass();

//输出：
//所有的包含文件工作都交给我！
//我来包含！./AutoloadClass.php
//你已经包含我了


// 另外我们可以改为匿名函数来实现：
spl_autoload_register(function ($className)
{
    echo "所有的包含文件工作都交给我！\r\n";
    $classFileName = "./{$className}.php";
    echo "我来包含！{$classFileName}\r\n";
    include "./{$className}.php";
}, true, true);
$objDemo = new AutoloadClass();

*/
