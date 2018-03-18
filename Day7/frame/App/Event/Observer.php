<?php
/**
 * Created by PhpStorm.
 * User: XX
 * Date: 2018/3/18
 * Time: 15:28
 */

namespace App\Event;


// 观察者。实现该接口，并添加进触发队列后，即可触发逻辑
interface Observer
{
    function update($eventInfo = null);
}