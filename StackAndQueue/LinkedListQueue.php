<?php
/**
 * Created by PhpStorm.
 * User: zhaoge
 * Date: 2020/5/2
 * Time: 11:41 上午
 */

namespace StackAndQueue;


class LinkedListQueue implements Queue
{

    /**
     * @var Node $head $tail
     * 不需要虚拟头结点
     */
    private $head, $tail;

    /**
     * @var int $size
     */
    private $size;

    public function __construct()
    {
        $this->head = null;
        $this->tail = null;
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

    public function enqueue($e)
    {
        if ($this->isEmpty()) {
            $this->tail = new Node($e);
            $this->head = $this->tail;
        } else {
            $this->tail->next = new Node($e);
            $this->tail = $this->tail->next;
        }
        $this->size++;
    }

    public function dequeue()
    {
        if ($this->isEmpty()) {
            echo "queue is empty".PHP_EOL;
            exit(-1);
        }
        $node = $this->head;
        $this->head = $this->head->next;
        if ($this->head == null)
            $this->tail = null;
        $this->size--;
        return $node;
    }

    public function getFront()
    {
        return $this->head;
    }

    public function printf()
    {
        $size = $this->getSize();
        $s = "Queue: size = $size ".PHP_EOL;
        $s .= "front [";
        $current = $this->head;
        while ($current != null) {
            $s .= $current->e."->";
            $current = $current->next;
        }
        $s .= "NULL] tail";
        echo $s;
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