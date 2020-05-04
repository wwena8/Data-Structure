<?php
/**
 * Created by PhpStorm.
 * User: zhaoge
 * Date: 2020/5/3
 * Time: 11:43 上午
 */

namespace SetAndMap;


use BST\BST;

class BSTSet implements Set
{
    /**
     * @var BST $bst
     */
    private $bst;

    public function __construct()
    {
        $this->bst = new BST();
    }

    public function add($e)
    {
        $this->bst->add($e);
    }

    public function remove($e)
    {
        $this->bst->remove($e);
    }

    public function contains($e)
    {
        return $this->bst->contains($e);
    }

    public function getSize()
    {
        return $this->bst->getSize();
    }

    public function isEmpty()
    {
        return $this->bst->isEmpty();
    }
}