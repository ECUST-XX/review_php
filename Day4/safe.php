<?php
/**
 * Created by PhpStorm.
 * User: XX
 * Date: 2018/2/25
 * Time: 20:46
 */

// sql注入问题：mysql_real_escape_string()已经在7.2中移除，数据库操作应当使用PDO对象（PDOStatement类负责过滤）
// PDO如何杜绝sql注入问题：http://zhangxugg-163-com.iteye.com/blog/1835721 (从程序间通讯的角度)
// PDO文档：http://php.net/manual/zh/book.pdo.php
//

$dsn = 'mysql:dbname=testdb;host=127.0.0.1';
$user = 'root';
$password = 'root';

try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
$dbh ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//设置以异常的形式报错
$dbh ->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE , PDO::FETCH_ASSOC );//设置fetch时返回数据形式为数组


$ps = $dbh->prepare("SELECT * FROM `article` WHERE `type` = ? and `menu` = ?");//生成一个PDOStatement实例
$ps->bindValue(1 , "文章");//第一个？处的参数换成 文章，不需要附加任何处理
$ps->bindValue(2 , 2);//第二个？处的参数换成2，不需要附加任何处理
$ps->execute(); //正式执行。
$res = $ps->fetchAll();//得到查询结果




//实例化pdo对象
$pdo = new PDO('mysql:host=127.0.0.1;port=3306;dbname=test;', 'root', '888888');
//通过query函数执行sql命令
$pdo->query('set names utf8');

//插入数据
$sql    = "insert into persons (name,age) values (?, ?);";
$preObj = $pdo->prepare($sql);
$res    = $preObj->execute(array('小明', 22));
var_dump($res);

//删除数据
$sql = "delete from persons where id = ?";
$preObj = $pdo->prepare($sql);
$res    = $preObj->execute(array(3));
var_dump($res);

//修改数据
$sql = "update persons set name = ? where id = ?;";
$preObj = $pdo->prepare($sql);
$res    = $preObj->execute(array('lucy', 5));
var_dump($res);

//查询数据
$sql = "select * from persons where age > ? order by id desc;";
$preObj = $pdo->prepare($sql);
$preObj->execute(array(20));
$arr = $preObj->fetchAll(PDO::FETCH_ASSOC);
/*
 * FETCH_BOTH      是默认的，可省，返回关联和索引。
 * FETCH_ASSOC     参数决定返回的只有关联数组。
 * PDO::FETCH_NUM  返回索引数组
 * PDO::FETCH_OBJ  返回由对象组成的二维数组
 */
print_r($arr);