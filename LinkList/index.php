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
$node = new \LinkList\LinkedList();
$node->addFirst(1);
$node->addFirst(2);
$node->addFirst(3);
$node->addFirst(3);
$node->addFirst(3);
$node->addFirst(3);
$node->addFirst(32);
$node->printf();
$node->removeElement(3);
echo PHP_EOL;
$node->printf();