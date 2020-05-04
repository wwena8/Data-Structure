<?php
/**
 * Created by PhpStorm.
 * User: zhaoge
 * Date: 2020/5/3
 * Time: 7:16 下午
 */

namespace SetAndMap;


interface Map
{
    public function add($key, $value);

    public function remove($key);

    public function contains($key);

    public function get($key);

    public function set($key, $value);

    public function getSize();

    public function isEmpty();
}