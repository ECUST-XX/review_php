<?php
/**
 * Created by PhpStorm.
 * User: XX
 * Date: 2018/2/24
 * Time: 16:14
 */

// 官方文档：文件系统 http://php.net/manual/zh/book.filesystem.php
// 官方文档：系统目录 http://php.net/manual/zh/book.dir.php
// 介绍php文件操作的文章 http://blog.csdn.net/zhou_yujia/article/details/50710904
// 介绍获取文件扩展名的文章 https://www.cnblogs.com/yuanwanli/p/5794060.html (最好使用第四种 pathinfo($file);)

/**
 * require 和 include 几乎完全一样，除了处理失败的方式不同之外。
 * require 在出错时产生 E_COMPILE_ERROR 级别的错误，将导致脚本中止。(在框架中，请始终使用 require 插入关键文件。)
 * 而 include 只产生警告（E_WARNING），脚本会继续运行。
 */




//递归函数实现查找计数功能
function fileall($fname)
{
    $sum = 0;
    if (is_dir($fname)) {
        $dir = opendir($fname);
        while ($name = readdir($dir)) {
            if ($name != "." && $name != "..") {
                $wzpath = $fname . "/" . $name;//将文件拼接成完整的路径
                if (is_file($wzpath)) {//如果是文件+1
                    $sum++;
                } else {//如果是文件夹调用本身函数查找所有文件
                    $sum += fileall($wzpath);
                }
            }
        }
        closedir($dir);
        return $sum;
    } else {
        return 1;
    }
}

echo fileall("../../review_php");
//var_dump(readdir("../../review_php"));
foreach (glob("../*") as $filename) {
    echo "$filename size " . filesize($filename) . "\n";
}
echo getcwd(), "\n";
echo dirname(__FILE__), "\n";
echo basename(__FILE__), "\n";

//fopen将指定的资源绑定到一个流上，使用文件指针来控制文件的读写，但不自动添加文件锁（考虑到多线程问题）
$handle = fopen("./file.txt", "a+b");
//为移植性考虑，强烈建议在用 fopen() 打开文件时总是使用 'b' 标记。

/**
 * r+读写方式打开，将文件指针指向文件头。
 * w+读写方式打开，将文件指针指向文件头并将文件大小截为零。如果文件不存在则尝试创建之。
 * a+读写方式打开，将文件指针指向文件末尾。如果文件不存在则尝试创建之。
 * x+创建并以读写方式打开，将文件指针指向文件头。如果存在文件则返回false并提示E_WARNING。
 */

//如果使用附加模试（a 或 a+），任何写入文件数据都会被附加上去，
//而文件的位置将会被忽略，调用 fseek() 的结果尚未定义。


var_dump(fread($handle, 100)); // 文件指针改变到100处（不足100则移至文件尾）
fwrite($handle, "hello!\n"); // 文件指针改变

fseek($handle, 3);
var_dump(fread($handle, 100));
// 写入后文件指针改变，所以r+w+a+三种模式第二次均读取失败。除非改变指针位置(取消 fseek($handle,3)的注释)
fwrite($handle, "hello!\n"); // 文件指针改变


fflush($handle); // 将缓冲内容输出到文件（安全操作）
//flock($handle, LOCK_UN);    // 释放文件锁。即便释放锁后文件依旧无法删除，必须关闭流(可以尝试注释 var_dump(fclose($handle));)
var_dump(fclose($handle)); // 关闭流
var_dump(unlink("./file.txt")); // 删除文件

//获取文件名称与路径信息的最好方法
var_dump(pathinfo(__FILE__));
