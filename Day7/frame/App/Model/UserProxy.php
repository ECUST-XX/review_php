<?php
/**
 * Created by PhpStorm.
 * User: XX
 * Date: 2018/3/18
 * Time: 20:36
 */

namespace App\Model;


interface UserProxy
{
    function setUser($id,$name);
    function getUser($id);
}