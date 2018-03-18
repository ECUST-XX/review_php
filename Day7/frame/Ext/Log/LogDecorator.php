<?php
/**
 * Created by PhpStorm.
 * User: XX
 * Date: 2018/3/18
 * Time: 18:43
 */

namespace Ext\Log;


interface LogDecorator
{
    function beforeInit();
    function afterInit();
}