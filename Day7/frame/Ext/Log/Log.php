<?php
/**
 * Created by PhpStorm.
 * User: XX
 * Date: 2018/3/17
 * Time: 17:24
 */

namespace Ext\Log;

class Log
{
    protected $a;
    protected $b;

    protected $decorator = [];

    public function log()
    {
        echo __METHOD__, "\n";
    }


    // 装饰器模式
    // 动态的添加修改类的功能，实现最大的灵活性
    public function addDecorator(LogDecorator $decorator)
    {
        $this->decorator[] = $decorator;
    }

    protected function beforeInit(){
        foreach ($this->decorator as $decorator){
            $decorator->beforeInit();
        }
    }

    protected function afterInit()
    {
        $temp = array_reverse($this->decorator);
        foreach ($temp as $decorator){
            $decorator->afterInit();
        }

    }

    public function init()
    {
        $this->beforeInit();

        for ($i = 0; $i < $this->a; $i++) {
            for ($j = 0; $j < $this->b; $j++) {
                echo '*';
            }
            echo "\n";
        }

        $this->afterInit();
    }

    public function setValue($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
        echo $a,$b,"\n";
    }

}