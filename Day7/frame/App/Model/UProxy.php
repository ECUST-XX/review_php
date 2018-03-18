<?php
/**
 * Created by PhpStorm.
 * User: XX
 * Date: 2018/3/18
 * Time: 20:37
 */

namespace App\Model;


class UProxy implements UserProxy
{
    // 从redis读数据
    public function getUser($id)
    {
        echo "get user $id from redis\n";
    }

    // 数据写入mysql
    public function setUser($id,$name)
    {
        echo "set user $id name = $name to mysql\n";
    }
}