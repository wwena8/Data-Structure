<?php
/**
 * Created by PhpStorm.
 * User: zhaoge
 * Date: 2020/4/30
 * Time: 12:59 下午
 */

namespace StackAndQueue;

interface Stack
{
    public function getSize();

    public function isEmpty();

    public function push($e);

    public function pop();

    public function peek();
}