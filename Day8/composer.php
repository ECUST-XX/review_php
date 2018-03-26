<?php
/**
 * Created by PhpStorm.
 * User: XX
 * Date: 2018/3/26
 * Time: 19:57
 */

// composer原理解析

// 三篇关于composer自动加载的文章：
// http://blog.hans-lizihan.com/php/2015/06/25/php-composer-autoload.html
// http://drops.leavesongs.com/php/composer-autoload-class-and-function-written-myself.html
// https://blog.csdn.net/sky_zhe/article/details/38637301
// composer自动加载的四种方法：https://segmentfault.com/a/1190000006429850
// 一篇关于psr-0的自动加载文章：https://blog.csdn.net/sky_zhe/article/details/38523145


// 先看完composer的源码和上述文章后，再看一遍composer的源码理解自动加载的思路会清晰很多。