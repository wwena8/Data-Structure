<?php
/**
 * Created by PhpStorm.
 * User: zhaoge
 * Date: 2020/5/1
 * Time: 1:36 下午
 */
namespace StackAndQueue;

class LoopQueue implements Queue
{

    private $array, $front, $tail, $size;

    public function __construct()
    {
        $a = func_get_args(); //获取构造函数中的参数
        if (!$a) {
            $this->array = new \SplFixedArray(10);
            $this->front = 0;
            $this->tail = 0;
            $this->size = 0;
        } else {
            $i = count($a);
            if (method_exists($this,$f='__construct'.$i)) {
                call_user_func_array(array($this,$f),$a);
            }
        }
    }

    /**
     * @param $capacity
     * 想在循环队列放置n个元素必须n+1个空间才够
     */
    public function __construct1($capacity)
    {
        $this->array = new \SplFixedArray($capacity+1);
        $this->front = 0;
        $this->tail = 0;
        $this->size = 0;
    }

    public function getSize()
    {
        return $this->size;
    }

    /**
     * @return int
     * 实际容量小1个元素空间
     */
    public function getCapacity()
    {
        return count($this->array)-1;
    }

    public function isEmpty()
    {
        return $this->front == $this->tail;
    }

    public function isFull()
    {
        return ($this->tail+1)%($this->getCapacity()+1) == $this->front;
    }

    public function resize($capacity)
    {
        $array = new \SplFixedArray($capacity + 1);
        for($i = 0; $i < $this->size; $i++) {
            $array[$i] = $this->array[($i+$this->front)%count($this->array)];
        }
        $this->array = $array;
        $this->front = 0;
        $this->tail = $this->size;
    }

    public function enqueue($e)
    {
        if ($this->isFull()) {
            $this->resize(2*$this->getCapacity());
        }
        $this->array[$this->tail] = $e;
        $this->tail = ($this->tail+1) % count($this->array);
        $this->size++;
    }

    public function dequeue()
    {
        if ($this->isEmpty()) {
            echo "LoopQueue is empty".PHP_EOL;
            exit(-1);
        }
        $e = $this->array[$this->front];
        $this->array[$this->front] = null;
        $this->front = ($this->front+1) % count($this->array);
        $this->size--;
        if ($this->getSize() == $this->getCapacity()/4 && $this->getCapacity()/2 != 0)
            $this->resize($this->getCapacity()/2);
        return $e;
    }

    public function getFront()
    {
        return $this->array[$this->front];
    }

    /**
     * 打印输出数组信息
     */
    public function printf()
    {
        $size = $this->getSize();
        $capacity = count($this->array);
        $s = "Queue: size = $size, capacity = $capacity".PHP_EOL;
        $s .= "front = $this->front[";
        for ($i = $this->front; $i != $this->tail; $i=($i+1)%count($this->array)) {
            $e = $this->array[$i];
            if (($i+1)%count($this->array) == $this->tail) {
                $s .= "$e";
            } else {
                $s .= "$e,";
            }
        }
        $s .= "] tail = $this->tail";
        echo $s;
    }
}