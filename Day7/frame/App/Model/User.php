<?php
/**
 * Created by PhpStorm.
 * User: XX
 * Date: 2018/3/18
 * Time: 13:18
 */

namespace App\Model;

use Ext\Database\Register;

class User
{
    public $id;
    public $name;
    public $score;

    protected $db;

    // 数据对象映射模式
    // 对对象的操作会映射为对数据的存储操作。ORM
    public function __construct($id)
    {
        $this->db = Register::getDB("mysql");
        $this->db->where("id = $id")->limit(1);
        // 获取从数据库中拉取的数据后格式化，但此处未实现该方法，所以手动实现模拟一下。偷懒一下
//        $data = $this->db->fetch_assoc();
        $data = ['id'=>$id,'name'=>'ZhangSan','score'=>'88'];
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->score = $data['score'];
    }

    public function __destruct()
    {
        $this->db->order("update User name = '{$this->name}',score = '{$this->score}' where id = '{$this->id}'");
    }
}