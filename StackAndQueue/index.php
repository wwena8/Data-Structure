<?php
/**
 * Created by PhpStorm.
 * User: zhaoge
 * Date: 2020/4/30
 * Time: 6:39 下午
 */
define('DS', __DIR__."/.."); //根目录 不管类在哪里一定要保证DS为根目录
define('CORE', DS.'/core'); //类型目录
use StackAndQueue\ArrayStack;
include CORE."/Util.php";
spl_autoload_register('\CORE\Util::load');
$linked_list_queue = new \StackAndQueue\LinkedListQueue();
$linked_list_queue->enqueue(1);
$linked_list_queue->enqueue(2);
$linked_list_queue->enqueue(3);
$linked_list_queue->dequeue();
$linked_list_queue->printf();