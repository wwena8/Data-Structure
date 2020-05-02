<?php
/**
 * Created by PhpStorm.
 * User: zhaoge
 * Date: 2020/5/2
 * Time: 9:58 上午
 */

namespace StackAndQueue;


use LinkList\LinkedList;

class LinkedListStack implements Stack
{

    private $linked_list;

    public function __construct()
    {
        $this->linked_list = new LinkedList();
    }

    public function getSize()
    {
        return $this->linked_list->getSize();
    }

    public function isEmpty()
    {
        return $this->linked_list->isEmpty();
    }

    public function push($e)
    {
        $this->linked_list->addFirst($e);
    }

    public function pop()
    {
        $this->linked_list->removeFirst();
    }

    public function peek()
    {
        return $this->linked_list->getFirst();
    }

    public function printf()
    {
        $s = "Stack: top ";
        echo $s;
        $this->linked_list->printf();
    }
}