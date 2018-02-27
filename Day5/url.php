<?php
/**
 * Created by PhpStorm.
 * User: XX
 * Date: 2018/2/27
 * Time: 15:15
 */

// url函数
// 官方文档：http://php.net/manual/zh/book.url.php

var_dump(parse_url("http://php.net/manual/zh/book.url.php"));
var_dump(get_headers("http://php.net/manual/zh/book.url.php"));
var_dump(urlencode("http://php.net/manual/zh/book.url.php"));