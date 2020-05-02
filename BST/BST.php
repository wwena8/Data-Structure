<?php
/**
 * Created by PhpStorm.
 * User: zhaoge
 * Date: 2020/5/2
 * Time: 6:24 下午
 */

namespace BST;

class BST
{
    /**
     * @var Node $root
     */
    private $root;
    private $size;

    public function __construct()
    {
        $this->root = null;
        $this->size = 0;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function isEmpty()
    {
        return $this->size == 0;
    }
}

class Node
{
    public $e;
    /**
     * @var Node $left $right
     */
    public $left,$right;

    public function __construct()
    {
        $args = func_get_args();
        if ($args) {
            switch (count($args)) {
                case 1:
                    if (method_exists($this,$f = "__construct1"))
                        call_user_func(array($this, $f), $args);
                    break;
            }
        }
    }

    public function __construct1($e)
    {
        $this->e = $e;
    }
}