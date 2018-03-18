<?php
/**
 * Created by PhpStorm.
 * User: XX
 * Date: 2018/3/17
 * Time: 22:20
 */

namespace Ext\Shop;

class Woman implements Strategy
{
    function showAD()
    {
        return "MAC";
    }
}