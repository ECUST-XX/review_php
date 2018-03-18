<?php
/**
 * Created by PhpStorm.
 * User: XX
 * Date: 2018/3/18
 * Time: 15:33
 */

namespace App\Event;

// 具体发生的事件
class Event extends EventGenerator
{
    public function trigger()
    {
        echo "EVENT \n";
        $this->notify();
    }
}