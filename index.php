<?php
/**
 * Created by PhpStorm.
 * User: zhaoge
 * Date: 2020/4/25
 * Time: 6:31 下午
 */
define('DS', __DIR__); //根目录
define('CORE', DS.'/core'); //根目录
use Shuzu\ShuZu;
include CORE . '/Util.php';
spl_autoload_register('\CORE\Util::load');
$s = new ShuZu(2);
$s->addLast(1);
$s->addLast(1);
$s->addLast(2);
$s->addLast(2);
$s->addLast(2);
echo $s->getCapacity();