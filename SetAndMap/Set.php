<?php
/**
 * Created by PhpStorm.
 * User: zhaoge
 * Date: 2020/5/3
 * Time: 11:41 上午
 */

namespace SetAndMap;


interface Set
{
    public function add($e);

    public function remove($e);

    public function contains($e);

    public function getSize();

    public function isEmpty();
}