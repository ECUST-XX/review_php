<?php
/**
 * Created by PhpStorm.
 * User: XX
 * Date: 2018/3/11
 * Time: 16:49
 */


// static 属性常驻内存

// 普通属性用$this->value
// static熟悉用self::$staticValue
// $this不能引用静态成员和常量。self更像类本事，而$this更像是实例本身。
class A
{
    const NUM = 0;   // 与c语言中的const类似，属于自定义常量，语法上NUM不属于变量，无法更改
    public static $publicNum = 0;
    protected static $protectedNum = 0;
    private static $privateNum = 0;

    public $noStaticNum = 0;

    public function __construct()
    {
        self::$publicNum++;
        self::$protectedNum++;
        self::$privateNum++;
        $this->noStaticNum++;

        var_dump(self::$publicNum, self::$protectedNum, self::$privateNum, $this->noStaticNum);
        echo "-----\n";
    }

    final public static function special()
    {
        echo "final public static function\n";
    }

}

new A();
new A();
$a = new A();
A::special();
echo A::NUM, A::$publicNum, $a->noStaticNum, "\n";// static属性常驻内存
var_dump($a::$publicNum);

// final  如果父类中的方法被声明为final，则子类无法覆盖该方法。如果一个类被声明为 final，则不能被继承。
final class BaseClass
{
    public function test()
    {
        echo "BaseClass::test() called\n";
    }

    final public function moreTesting()
    {
        echo "BaseClass::moreTesting() called\n";
    }
}

//class ChildClass extends BaseClass
//{
//    public function moreTesting()
//    {
//        echo "ChildClass::moreTesting() called\n";
//    }
//}

echo "\n-----\n";
define("x", "5");
$x = x + 10;
echo x, $x;

echo "\n-----\n";
$father="mother";
$mother="son";
echo $$father; //php里变量字符串之前加$等于指向另外一个字符串