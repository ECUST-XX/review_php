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


$dsn = 'mysql:dbname=testdb;host=127.0.0.1;port=3306;charset=utf8';
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



// Modern PHP 中关于PDO的教程
$sql = 'SELECT id FROM users WHERE email = :email';
$statement = $pdo->prepare($sql);

$email = filter_input(INPUT_GET,'email');
$statement->bindValue(':email',$email,PDO::PARAM_STR); // PDO::PARAM_STR为默认值
// 其他常用参数 PDO::PARAM_INT PARAM_BOOL PARAM_NULL
// 预处理语句会自动过滤$email中的值，防止sql注入

$statement->execute();
while (($result = $statement->fetch()) !== false) {
    echo $result['email'];
}
// PDO::FETCH_ASSOC 将对应结果集中的每一行作为一个由列名索引的数组返回
// PDO::FETCH_NUM 将对应结果集中的每一行作为一个由列号索引的数组返回
// PDO::FETCH_BOTH (默认) FETCH_ASSOC与FETCH_NUM的结合
// PDO::FETCH_OBJ 将结果集中的每一行作为一个属性名对应列名的对象返回

// PDO事务处理
$money = 50;
$name1 = "xiaoming";
$pdo->beginTransaction();//开始事务
$user1 = $pdo->prepare('UPDATE user 
                SET amount = amount - :amount
                WHERE name = :name');
$user2 = $pdo->prepare('UPDATE user 
                SET amount = amount - :amount
                WHERE name = :name');

// bindParam与bindValue的区别 https://segmentfault.com/a/1190000002968592
$user1->bindParam(':amount',$money);
$user1->bindValue(':name',$name1);
$user1->execute();
$user2->bindValue(':amount',50);
$user2->bindValue(':name',"zhangsan");
$user2->execute();
$pdo->commit();//提交事务





// xss攻击
// xss攻击介绍：http://blog.csdn.net/u011781521/article/details/53894399
// xss防范讨论：https://segmentfault.com/q/1010000004067521 (智者千虑必有一失)
// 常用 htmlspecialchars()与htmlentities()


$str = "A 'quote' is <b>bold</b>";

// 输出: A 'quote' is &lt;b&gt;bold&lt;/b&gt;
//echo html_entity_decode(htmlentities($str)),"\n";
echo htmlentities($str), "\n";
// 输出: A &#039;quote&#039; is &lt;b&gt;bold&lt;/b&gt;
echo htmlentities($str, ENT_QUOTES), "\n";


$new = htmlspecialchars("<a href='test'>Test</a>", ENT_QUOTES);
echo $new; // &lt;a href=&#039;test&#039;&gt;Test&lt;/a&gt;
/**
 * 如果 flags 的设置模糊易混淆，将遵循以下规则：
 *
 * 当 ENT_COMPAT、ENT_QUOTES、ENT_NOQUOTES 都没设置， 默认就是 ENT_COMPAT。
 * 如果设置不止一个 ENT_COMPAT、 ENT_QUOTES、 ENT_NOQUOTES ，优先级最高的是 ENT_QUOTES， 其次是 ENT_COMPAT。
 * 当 ENT_HTML401、 ENT_HTML5、 ENT_XHTML、 ENT_XML1 都没设置，默认是 ENT_HTML401。
 * 如果设置不止一个 ENT_HTML401、 ENT_HTML5、 ENT_XHTML、 ENT_XML1， 优先级最高的是 ENT_HTML5 其次是 ENT_XHTML 和 ENT_HTML401。
 * 如果设置不止一个 ENT_DISALLOWED、 ENT_IGNORE、 ENT_SUBSTITUTE，优先级最高的是 ENT_IGNORE， 其次是 ENT_SUBSTITUTE。
 */





// CSRF攻击
// 一篇csrf攻击方式与防御策略的文章：http://www.cnblogs.com/hyddd/archive/2009/04/09/1432744.html#!comments
// 一般框架多采用服务端生成hash并验证的方法防范csrf


// DDOS攻击
// DDOS防御：呵呵,还是砸钱堆带宽或者尝试CDN吧，那不是php该管的事
