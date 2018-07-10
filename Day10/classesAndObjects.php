<?php
// 基本概念
/**
构造函数可在被覆盖时使用不同的参数
 */
// 英文文档：增加 类部分的5.6.0与7.0.0更新
// 增加 属性与函数文档

// 类常量
// 英文文档：增加Namespaced::class使用示例
// 增加 7.1.0允许修饰符用于类常量
//class Foo {
//    // As of PHP 7.1.0
//    public const BAR = 'bar';
//    private const BAZ = 'baz';
//}
//echo Foo::BAR, PHP_EOL;
//echo Foo::BAZ, PHP_EOL;

// 构造函数和析构函数
// 英文文档：增加 旧样式构造函数在7.0.0中废弃

// 访问控制
// 英文文档：增加 7.1.0允许修饰符用于类常量的说明

// Static（静态）关键字
// 英文文档：增加 7.0.0不推荐静态调用非静态方法
// 增加静态属性文档

// 抽象类
/**
继承一个抽象类的时候，子类必须定义父类中的所有抽象方法；另外，这些方法的访问控制必须和父类中一样（或者更为宽松）。
 */

// 对象接口
/**
接口中定义的所有方法都必须是公有。

接口中也可以定义常量，但是不能被子类或子接口所覆盖。
 */
// 英文文档：修改 5.3.9之后支持多个接口具有相同方法名

// Trait
/**
优先顺序是当前类中的方法会覆盖 trait 方法，而 trait 方法又覆盖了基类中的方法。

Trait 同样可以定义属性。

为了对使用的类施加强制要求，trait 支持抽象方法的使用。

Traits 可以被静态成员静态方法定义。

多trait冲突解决：使用insteadof与as
as使用方法（可以修改访问控制）：use HelloWorld { sayHello as private myPrivateHello; }
trait A {
public function smallTalk() {
echo 'a';
}
public function bigTalk() {
echo 'A';
}
}

trait B {
public function smallTalk() {
echo 'b';
}
public function bigTalk() {
echo 'B';
}
}

class Talker {
use A, B {
B::smallTalk insteadof A;
A::bigTalk insteadof B;
}
}

class Aliased_Talker {
use A, B {
B::smallTalk insteadof A;
A::bigTalk insteadof B;
B::bigTalk as talk;
}
}
 */

// 匿名类
/**
PHP 7 开始支持匿名类。可以创建一次性的简单对象。

声明的同一个匿名类，所创建的对象都是这个类的实例。

为了访问外部类（Outer class）protected 属性或方法，匿名类可以 extend（扩展）此外部类。 为了使用外部类（Outer class）的 private 属性，必须通过构造器传进来：
class Outer
{
private $prop = 1;
protected $prop2 = 2;

protected function func1()
{
return 3;
}

public function func2()
{
return new class($this->prop) extends Outer {
private $prop3;

public function __construct($prop)
{
$this->prop3 = $prop;
}

public function func3()
{
return $this->prop2 + $this->prop3 + $this->func1();
}
};
}
}

echo (new Outer)->func2()->func3();
 */

// 重载
/**
 * 这些魔术方法的参数都不能通过引用传递。
 */

// 魔术方法
// 英文文档：增加 __set_state()使用的注意事项

// Final 关键字
/**
属性不能被定义为 final，只有类和方法才能被定义为 final
 */

// 类型约束
// 英文文档：本文档已移至函数参考。

// 后期静态绑定
/**
 * 用于在继承范围内引用静态调用的类。

后期静态绑定的解析会一直到取得一个完全解析了的静态调用为止。另一方面，如果静态调用使用 parent:: 或者 self:: 将转发调用信息。
class A {
public static function foo() {
static::who();
}

public static function who() {
echo __CLASS__."\n";
}
}

class B extends A {
public static function test() {
A::foo();
parent::foo();
self::foo();
}

public static function who() {
echo __CLASS__."\n";
}
}
class C extends B {
public static function who() {
echo __CLASS__."\n";
}
}

C::test();
 */

// 对象和引用
/**
 * 默认情况下对象是通过引用传递的
 */




