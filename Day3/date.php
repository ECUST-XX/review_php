<?php
/**
 * Created by PhpStorm.
 * User: XX
 * Date: 2018/2/23
 * Time: 22:48
 */

// 日期打印
date_default_timezone_set('PRC'); // 时区设置 UTC(通用协调时间)与GMT(格林威治标准时间)相同

printf(date("F j, Y, g:i a",time()));
echo "\n",date("l \\t\h\\e jS"),"\n";
echo date('\i\t \i\s \t\h\e jS \d\a\y.'."\n"); // 注意转义问题
echo date("m.d.y");
echo date('H:m:s \m \i\s\ \m\o\n\t\h'."\n");
echo date("Y-m-d H:i:s"),"\n"; // 常用格式 24h
echo date("Y-m-d h:i:sa"); // 常用格式 12h am pm

// 日期计算
echo "\n";
echo "明天:",date('Y-m-d H:i:s',strtotime('+1 day')),"\n";

$d1=strtotime("December 31");
$d2=ceil(($d1-time())/60/60/24);
echo "距离十二月三十一日还有：" . $d2 ." 天。","\n";

// 日期转换 strtotime
echo strtotime("+1 week 2 days 4 hours 2 seconds"), "\n";
echo strtotime("next Thursday"), "\n";
echo strtotime("last Monday"), "\n";

// 创建日期 mktime
$d=mktime(15, 66, 31, 6, 10, 2018); // 溢出数据会自动计算
echo "创建日期是 " . date("Y-m-d h:i:sa", $d);

