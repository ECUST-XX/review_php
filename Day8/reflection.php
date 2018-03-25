<?php
/**
 * Created by PhpStorm.
 * User: XX
 * Date: 2018/3/25
 * Time: 16:15
 */

// 反射机制
// java与php中叫反射机制，C++好像是叫友元函数
// 面试时被问道如何访问一个类中的私有方法，我说直接改代码。。。。。。。


// 官方文档：http://php.net/manual/zh/book.reflection.php
// 关于反射的文章：http://www.cnblogs.com/nixi8/p/5176213.html


/**
 * class Reflection { }
 * interface Reflector { }
 * class ReflectionException extends Exception { }
 * class ReflectionFunction implements Reflector { }
 * class ReflectionParameter implements Reflector { }
 * class ReflectionMethod extends ReflectionFunction { }
 * class ReflectionClass implements Reflector { }
 * class ReflectionObject extends ReflectionClass { }
 * class ReflectionProperty implements Reflector { }
 * class ReflectionExtension implements Reflector { }
 *
 *
 * 用得比较多的就只有两个ReflectionClass与ReflectionObject，两个的用法都一样，
 * 只是前者针对类，后者针对对象，后者是继承前者的类；
 * 然后其中又有一些属性或方法能返回对应的Reflection对象（ReflectionProperty以及ReflectionMethod）
 */

// dirname()嵌套可以获取上级文件夹路径（题外话。。。）
var_dump(dirname(dirname(__FILE__)));
var_dump(dirname(dirname(dirname(__FILE__))));


// 普通用户函数
function foobar($arg, $arg2)
{
    echo __FUNCTION__, " got $arg and $arg2\n";
}

// 测试用类Foo
/**
 * 这是类Foo的DocComment
 */
class Foo
{
    public $publicProperty = "publicProperty";
    protected $protectedProperty = "protectedProperty";
    private $privateProperty = "privateProperty";

    static public $staticPublicProperty = "staticPublicProperty";
    static protected $staticProtectedProperty = "staticProtectedProperty";
    static private $staticPrivateProperty = "staticPrivateProperty";

    const CONST = "CONST";

    final function finalFunction(){
        echo __METHOD__, "\n";
    }

    // 不是DocComment
    /* 不是DocComment */
    /** 不是DocComment */

    /**
     * 这是方法privateFunction的DocComment
     * @param $arg string
     * @param $arg2 string
     */
    private function privateFunction($arg, $arg2)
    {
        echo __METHOD__, " got $arg and $arg2\n";
    }

    public function publicFunction()
    {
        echo __METHOD__, "\n";
    }
}


// 动态调用普通函数,当参数和调用方法名称不确定的时候很好用
call_user_func_array("foobar", array("one", "two"));

$foo = new Foo;
// 当尝试调用私有方法或属性时会抛出异常
// call_user_func_array(array($foo, "bar"), array("three", "four"));


echo "反射:", "\n";
// 反射类
$class = new ReflectionClass("Foo");


// 调用私有变量
$property = $class->getProperty("privateProperty");
// 必须修改访问权限
$property->setAccessible(true);
// 权限修改后不影响属性 输出为：1024
echo "\n\n",$property->getModifiers();
// 需要类实例化
// 所以如果要访问抽象类中的方法与属性，反射应该不能解决问题吧
var_dump($property->getValue($foo));


// 调用私有方法,同样需要修改权限与类实例化
$method = $class->getMethod("privateFunction");
$method->setAccessible(1);
$method->invokeArgs($foo, ["aq", "pz"]);
$method->invoke($foo, "22", "qp");

// 不使用ReflectionClass类，也可以使用以下方法调用
$pm = new ReflectionMethod("Foo", "privateFunction");
var_dump($pm->getDocComment(),$pm->getModifiers());
$pm->setAccessible(true);
// 权限修改后不影响属性 输出为：134284288
// 猜测输出应该是1024，但实际输出为：134284288，估计方法的修饰符有初始值为：134283264 （通过添加修饰词该数值回变化）
var_dump($pm->getModifiers());
$pm->invokeArgs($foo, ["sa", "qa"]);

$pm = new ReflectionMethod("Foo", "finalFunction");
var_dump($pm->getModifiers());
$pm = new ReflectionMethod("Foo", "publicFunction");
var_dump($pm->getModifiers());



var_dump($class->getConstructor());
var_dump($class->getStartLine(), $class->getEndLine());
var_dump($class->getProperties());
var_dump($class->getDocComment());
var_dump($class->getConstants());
var_dump($class->getMethods());
var_dump($class->getModifiers());

echo "\n",'$class只是ReflectionClass，调用newInstance()方法后实例化Foo类',"\n";
var_dump($class,$class->newInstance());


