<?php
/**
 * Created by PhpStorm.
 * User: XX
 * Date: 2018/3/18
 * Time: 14:39
 */

namespace App\Model;


class Factory
{
    // 工厂模式配合注册树模式实现单一Model，节约资源
    static public function getUser($id)
    {
        $key = 'user_' . $id;
        $user = Register::getModel($key);
        if (!$user) {
            $user = new User($id);
            Register::setModel($key, $user);
        }
        return $user;
    }
}