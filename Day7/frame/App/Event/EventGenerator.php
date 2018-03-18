<?php
/**
 * Created by PhpStorm.
 * User: XX
 * Date: 2018/3/18
 * Time: 15:23
 */

namespace App\Event;

// 观察者模式
// 当一个对象状态发生改变时，依赖它的全部对象都会收到通知，触发逻辑
// 继承该抽象类的事件，可以添加逻辑并触发
abstract class EventGenerator
{
    private $observers = [];

    // 添加被逻辑
    function addObserver(Observer $observer)
    {
        $this->observers[] = $observer;
    }

    // 触发器，用来触发逻辑
    function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update();
        }
    }
}