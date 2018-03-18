<?php
/**
 * Created by PhpStorm.
 * User: XX
 * Date: 2018/3/17
 * Time: 22:21
 */

namespace Ext\Shop;

class ShowAD
{

    // 策略模式
    // 用来将一组行为或算法封装成类，以适应特点上下文环境
    // 首先定义接口，然后实现类，调用时控制输入类型
    // 策略模式可以实现Ioc，依赖倒置，控制反转
    public function show(Strategy $sex)
    {
        return $sex->showAD();
    }

}
