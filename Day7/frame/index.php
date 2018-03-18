<?php
/**
 * Created by PhpStorm.
 * User: XX
 * Date: 2018/3/17
 * Time: 17:14
 */

// PSR-0规范下的自动加载
// 官方给出的PSR-4示例：https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader-examples.md

define("BASE", __DIR__);

require BASE . "/Ext/Autoload.php";

spl_autoload_register('Autoload::load');


$log = new Ext\Log\Log();
$log->log();

$home = new \App\Controller\Home\Home();
$home->home();

// 报错，因为没有自动加载文件，原因是Database的命名空间问题
//$database = new \Database\Database();
//$database->database();

// 程序启动时，对需要的类进行注册操作
$DB = new \Ext\Database\Database();
$DB->getMysql(); //++++++
//$DB->getMysql(); //------
//$DB->getMysql(); //------

$mysql = \Ext\Database\Register::getDB("mysql");
$mysql->where("ll")->limit(5)->order("pp");

echo "\n\nStrategyStrategyStrategyStrategyStrategy\n";
$show = new \Ext\Shop\ShowAD();
echo $show->show(new \Ext\Shop\Man());
echo $show->show(new \Ext\Shop\Woman());

echo "\n\nORMORMORMORMORMORMORMORMORMORMORMORM\n";
$user1 = \App\Model\Factory::getUser('1');
$user2 = \App\Model\Factory::getUser('1');
echo "\n";
// ORM实现单一对象，节省资源
var_dump($user1 === $user2);


echo "\n\nObserverObserverObserverObserverObserver\n";
// 添加事件
$event = new \App\Event\Event();
// 添加被触发的逻辑
$event->addObserver(new \App\Event\ObserverFirst());
$event->addObserver(new \App\Event\ObserverSecond());
// 触发逻辑，执行逻辑内容
$event->trigger();


// 原型模式
// 通过克隆来创建大对象，节省创建对象的开销，在内存中直接拷贝
echo "\n\nprototypeprototypeprototypeprototypeprototype\n";
$prototype = new \Ext\Log\Log();

$log1 = clone $prototype;
$log1->setValue(3, 3);
$log1->init();
echo "\n";
$log2 = clone $prototype;
$log2->setValue(2, 2);
$log2->init();
var_dump($prototype, $log1, $log2);


// 装饰器模式
echo "\n\nDecoratorDecoratorDecoratorDecoratorDecorator\n";
$log = new \Ext\Log\Log();
$log->setValue(2, 2);
$log->addDecorator(new \Ext\Log\ColorLogDecorator());
$log->addDecorator(new \Ext\Log\FontLogDecorator());
$log->init();


// 迭代器模式
echo "\n\nIteratorIteratorIteratorIteratorIteratorIterator\n";
$allUsers = new \App\Model\AllUsers();
foreach ($allUsers as $k => $u) {
    var_dump($k, $u);
}


// 代理模式
// 客户端与实体之间建立一个代理对象，客户端通过代理对象操作实体。
echo "\n\nProxyProxyProxyProxyProxyProxyProxyProxyProxyProxyProxy\n";
$proxy = new \App\Model\UProxy();
$proxy->getUser(1);
$proxy->setUser(2,"Yukiri");

