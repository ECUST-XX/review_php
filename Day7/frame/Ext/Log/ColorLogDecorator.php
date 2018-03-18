<?php
/**
 * Created by PhpStorm.
 * User: XX
 * Date: 2018/3/18
 * Time: 18:45
 */

namespace Ext\Log;


class ColorLogDecorator implements LogDecorator
{
    public function beforeInit()
    {
        echo __CLASS__,__METHOD__,"\n";
    }

    public function afterInit()
    {
        echo __CLASS__,__METHOD__,"\n";
    }
}