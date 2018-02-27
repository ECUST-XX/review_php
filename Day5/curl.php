<?php
/**
 * Created by PhpStorm.
 * User: XX
 * Date: 2018/2/27
 * Time: 14:35
 */

// curl抓取 Guzzle抓取
// 参数详解：http://php.net/manual/zh/function.curl-setopt.php

// 1. 初始化
$ch = curl_init();
// 2. 设置选项，包括URL
curl_setopt($ch, CURLOPT_URL, "http://www.baidu.com");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
// 3. 执行并获取HTML文档内容
$output = curl_exec($ch);
if ($output === FALSE) {
    echo "CURL Error:" . curl_error($ch);
}
// 4. 释放curl句柄
curl_close($ch);