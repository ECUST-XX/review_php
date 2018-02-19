<?php
/**
 * Created by PhpStorm.
 * User: XX
 * Date: 2018/2/19
 * Time: 17:27
 */

//匿名函数(闭包)

$func = function () {
    print('$func() Hello world!!');
};//这里必须要有;结尾
$func();
echo "\n";
// 等效于
function func()
{
    print('func() Hello world!!');
}

func();
echo "\n";


// DI依赖注入
class Di
{
    private $_factory;

    public function set($id, $value)
    {
        $this->_factory[$id] = $value;
    }

    public function get($id)
    {
        $value = $this->_factory[$id];
        var_dump($value);
        return $value();
    }
}

class User
{
    private $_username;

    function __construct($username = "")
    {
        echo "User->$username has been constructed\n";
        $this->_username = $username;
    }

    function getUserName()
    {
        return $this->_username;
    }
}

//从这里开始看
$di = new Di();
$di->set("zhangsan", function () {
    return new User('张三');
});
$di->set("zhang", "li");
$di->set("lisi", function () {
    return new User("李四");
});
echo "注入完成,对象未实例化\n";
echo $di->get("zhangsan")->getUserName();
echo $di->get("lisi")->getUserName();
echo "\n";
/**
 * 代码中有一个Di容器用来保存对象实例，然后通过set()方法注册服务，通过get()方法获取服务。
 * 我们看到$di->set()的时候，使用了匿名函数，我们预先注册了zhangsan和lisi两个服务，
 * 这两个服务都是User类的实例，在$di->set的时候实际上并没有实例化，
 * 而是在$di->get()的时候才执行了匿名函数并将对象返回，这就实现了按需实例化，
 * 不用则不实例化，提高效率。
 */


// 匿名函数
// 当想将外层变量传进内层匿名函数时，可以使用use (变量)的方式。
function func1($a)
{
    return function ($b) use ($a) {
        echo $a;
        echo $b;
    };
}

$a = func1("a");
$a(5);//输出a5




