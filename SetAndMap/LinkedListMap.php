<?php
/**
 * Created by PhpStorm.
 * User: zhaoge
 * Date: 2020/5/3
 * Time: 7:19 下午
 */

namespace SetAndMap;


class LinkedListMap implements Map
{

    /**
     * @var Node $dummyHead
     */
    private $dummyHead;
    private $size;

    public function __construct()
    {
        $this->dummyHead = new Node();
    }

    public function add($key, $value)
    {
        $node = $this->getNode($key);
        if (!$node) {
            $this->dummyHead->next = new Node($key, $value, $this->dummyHead->next);
            $this->size++;
        } else {
            $node->value = $value;
        }
    }

    /**
     * @param $key
     * @return Node|null
     * 删除键为$key的节点并返回之
     */
    public function remove($key)
    {
        $current = $this->dummyHead;
        while ($current) {
            if ($current->next->key == $key)
                break;
            $current = $current->next;
        }
        if ($current->next) {
            $node = $current->next;
            $current->next = $node->next;
            $node->next = null;
            $this->size--;
            return $node;
        }
        return null;
    }

    public function contains($key)
    {
        return $this->getNode($key) != null;
    }

    public function get($key)
    {
        return $this->getNode($key);
    }

    public function set($key, $value)
    {
        $node = $this->getNode($key);
        if (!$node) {
            return;
        } else {
            $node->value = $value;
        }
    }

    public function getSize()
    {
        return $this->size;
    }

    public function isEmpty()
    {
        return $this->size == 0;
    }

    /**
     * @param $key
     * @return Node|null
     * 返回key值为$key的结点
     */
    private function getNode($key)
    {
        $current = $this->dummyHead->next;
        while ($current != null) {
            if ($current->key == $key)
                return $current;
            $current = $current->next;
        }
        return null;
    }
}

class Node{
    public $key, $value;
    /**
     * @var Node $next
     */
    public $next;

    public function __construct()
    {
        $a = func_get_args(); //获取构造函数中的参数
        if (!$a) {
            $this->key = null;
            $this->value = null;
            $this->next = null;
        } else {
            switch (count($a)) {
                case 1:
                    if (method_exists($this,$f='__construct1')) {
                        call_user_func_array(array($this,$f),$a[0]);
                    }
                    break;
                case 2:
                    if (method_exists($this,$f='__construct2')) {
                        call_user_func_array(array($this,$f),$a);
                    }
                    break;
                case 3:
                    if (method_exists($this,$f='__construct3')) {
                        call_user_func_array(array($this,$f),$a);
                    }
                    break;
            }
        }
    }

    public function __construct1($key)
    {
        $this->key = $key;
        $this->value = null;
        $this->next = null;
    }

    public function __construct2($key, $value)
    {
        $this->key = $key;
        $this->value = $value;
        $this->next = null;
    }

    public function __construct3($key, $value, $next)
    {
        $this->key = $key;
        $this->value = $value;
        $this->next = $next;
    }

    public function printf()
    {
        echo $this->key.":".$this->value;
    }
}