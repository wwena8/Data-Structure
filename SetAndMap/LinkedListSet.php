<?php
/**
 * Created by PhpStorm.
 * User: zhaoge
 * Date: 2020/5/3
 * Time: 11:49 上午
 */

namespace SetAndMap;


use LinkList\LinkedList;

class LinkedListSet implements Set
{

    /**
     * @var LinkedList $linked_list
     */
    private $linked_list;

    public function __construct()
    {
        $this->linked_list = new LinkedList();
    }

    public function add($e)
    {
        if (!$this->contains($e)) {
            $this->linked_list->addFirst($e);
        }

    }

    public function remove($e)
    {
        $this->linked_list->removeElement($e);
    }

    public function contains($e)
    {
        return $this->linked_list->contains($e);
    }

    public function getSize()
    {
        return $this->linked_list->getSize();
    }

    public function isEmpty()
    {
        return $this->linked_list->isEmpty();
    }
}