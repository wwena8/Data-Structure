<?php
/**
 * Created by PhpStorm.
 * User: zhaoge
 * Date: 2020/5/1
 * Time: 11:49 上午
 */
namespace StackAndQueue;
interface Queue
{
    public function getSize();

    public function isEmpty();

    public function enqueue($e);

    public function dequeue();

    public function getFront();
}