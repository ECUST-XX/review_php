<?php
/**
 * Created by PhpStorm.
 * User: XX
 * Date: 2018/3/18
 * Time: 15:37
 */

namespace App\Event;

// 被触发的具体逻辑之一
class ObserverFirst implements Observer
{
    public function update($info = null)
    {
        echo "事件触发：",__CLASS__,$info,"\n";
    }
}