<?php
/**
 * Created by PhpStorm.
 * User: XX
 * Date: 2018/2/27
 * Time: 0:19
 */

// php字符处理
// 讲道理，这东西我一直是查文档的。。。。。
// 方便查找：https://www.cnblogs.com/weblm/p/5791016.html
//          http://www.sandaoge.com/info/new_id/20.html

$str = 'learn PHP';
echo strlen($str), "\n";
echo substr($str, 2, 4), "\n";
echo trim($str, "P"), "\n";
echo strtoupper($str), "\n";
echo strtolower($str), "\n";
echo strstr($str, "PHP"), "\n";
echo stristr($str, "php"), "\n";
var_dump(explode(" ", $str));