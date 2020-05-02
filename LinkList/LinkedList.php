<?php
/**
 * Created by PhpStorm.
 * User: zhaoge
 * Date: 2020/5/1
 * Time: 4:49 下午
 */

namespace LinkList;
class LinkedList
{
    /**
     * @var Node $head
     */
    private $dummyHead;
    private $size;

    public function __construct()
    {
        $this->dummyHead = new Node();
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

    /**
     * @param $e
     * 链表头部插入节点
     */
    public function addFirst($e)
    {
        $this->add(0, $e);
    }

    /**
     * @param $index
     * @param $e
     * 在第index个位置插入数据域为e的节点
     */
    public function add($index, $e)
    {
        if ($index<0 || $index>$this->size) {
            echo "add index is wrong".PHP_EOL;
            exit(-1);
        }

        $prev = $this->dummyHead;
        for ($i = 0; $i < $index; $i++) {
            $prev = $prev->next;
        }
//        $node = new Node($e);
//        $node->next = $prev->next;
//        $prev->next = $node;
        $prev->next = new Node($e, $prev->next);
        $this->size++;
    }

    /**
     * @param $e
     * 尾插
     */
    public function addLast($e)
    {
        $this->add($this->size, $e);
    }

    /**
     * @param $index
     * @return Node|null
     * 返回索引为index的结点
     */
    public function get($index)
    {
        if ($index < -1 || $index>=$this->size) {
            echo "get index is wrong".PHP_EOL;
            exit(-1);
        }
        if ($index == -1) {
            return $this->dummyHead;
        }
        /**
         * @var Node $current
         */
        $current = $this->dummyHead->next;
        for ($i = 0 ; $i < $index ; $i++) {
            $current = $current->next;
        }
        return $current;
    }

    public function getFirst()
    {
        return $this->get(0);
    }

    public function getLast()
    {
        return $this->get($this->size-1);
    }

    public function set($index, $e)
    {
        if ($index<0 || $index>=$this->size) {
            echo "set index is wrong".PHP_EOL;
            exit(-1);
        }
        /**
         * @var Node $current
         */
        $current = $this->dummyHead->next;
        for ($i = 0 ; $i < $index ; $i++) {
            $current = $current->next;
        }
        $current->e = $e;
    }

    public function contains($e)
    {
        /**
         * @var Node $current
         */
        $current = $this->dummyHead->next;
        while ($current != null) {
            if ($current->e == $e)
                return true;
            $current = $current->next;
        }
        return false;
    }

    public function remove($index)
    {
        if ($index<0 || $index>=$this->size) {
            echo "remove index :$index is wrong".PHP_EOL;
            exit(-1);
        }
        $prev = $this->get($index-1);
        /**
         * @var Node $node
         */
        $node = $prev->next;
        $prev->next = $node->next;
        $this->size--;
        return $node;
    }

    public function removeFirst()
    {
        $this->remove(0);
    }

    public function removeLast()
    {
        $this->remove($this->size-1);
    }

    public function printf()
    {
        /**
         * @var Node $current
         */
        $current = $this->dummyHead->next;
        while ($current != null) {
            echo $current->e."->";
            $current = $current->next;
        }
        echo "NULL";
    }

}
class Node{
    public $e;
    public $next;

    public function __construct()
    {
        $a = func_get_args(); //获取构造函数中的参数
        if (!$a) {
            $this->e = null;
            $this->next = null;
        } else {
            switch (count($a)) {
                case 1:
                    if (method_exists($this,$f='__construct1')) {
                        call_user_func_array(array($this,$f),$a);
                    }
                    break;
                case 2:
                    if (method_exists($this,$f='__construct2')) {
                        call_user_func_array(array($this,$f),$a);
                    }
                    break;
            }
        }
    }

    public function __construct1($e)
    {
        $this->e = $e;
        $this->next = null;
    }

    public function __construct2($e, $next)
    {
        $this->e = $e;
        $this->next = $next;
    }

    public function printf()
    {
        echo $this->e;
    }
}

