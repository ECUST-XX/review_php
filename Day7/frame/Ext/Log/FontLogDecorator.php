<?php
/**
 * Created by PhpStorm.
 * User: XX
 * Date: 2018/3/18
 * Time: 18:55
 */

namespace Ext\Log;


class FontLogDecorator implements LogDecorator
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