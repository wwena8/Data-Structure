<?php
/**
 * Created by PhpStorm.
 * User: zhaoge
 * Date: 2020/5/3
 * Time: 11:46 上午
 */
define('DS', __DIR__."/.."); //根目录 不管类在哪里一定要保证DS为根目录
define('CORE', DS.'/core'); //类型目录
include CORE."/Util.php";
spl_autoload_register('\CORE\Util::load');
$bst_map = new \SetAndMap\BSTMap();
$bst_map->add('a',1);
$bst_map->add('b',2);
$bst_map->remove('b');
echo $bst_map->get('a')->value;
