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
$array_queue = new \StackAndQueue\ArrayQueue();
$loop_queue = new \StackAndQueue\LoopQueue();
$i = 0;
while ($i < 100000) {
    $array_queue->enqueue(rand(0,1000));
    $loop_queue->enqueue(rand(0,1000));
    $i++;
}
$start1 = time();
while (!$array_queue->isEmpty()) {
    $array_queue->dequeue();
}
$start2 = time();
while (!$loop_queue->isEmpty()) {
    $loop_queue->dequeue();
}
$start3 = time();
$wast1 = $start2-$start1;
$wast2 = $start3-$start2;
echo "array:$wast1   loop:$wast2".PHP_EOL;
