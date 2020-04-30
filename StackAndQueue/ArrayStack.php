<?php
/**
 * Created by PhpStorm.
 * User: zhaoge
 * Date: 2020/4/30
 * Time: 1:03 下午
 */

namespace StackAndQueue;


use Shuzu\ShuZu;

class ArrayStack implements Stack
{

    private $array;

    public function __construct()
    {
        $a = func_get_args(); //获取构造函数中的参数
        if (!$a) {
            $this->array = new ShuZu();
        } else {
            $i = count($a);
            if (method_exists($this,$f='__construct'.$i)) {
                call_user_func_array(array($this,$f),$a);
            }
        }
    }

    public function __construct1($capacity)
    {
        $this->array = new ShuZu($capacity);
    }

    public function getSize()
    {
        return $this->array->getSize();
    }

    public function isEmpty()
    {
        return $this->array->isEmpty();
    }

    public function getCapacity()
    {
        return $this->array->getCapacity();
    }

    public function push($e)
    {
        $this->array->addLast($e);
    }

    public function pop()
    {
        return $this->array->removeLast();
    }

    public function peek()
    {
        return $this->array->getLast();
    }

    /**
     * 打印输出数组信息
     */
    public function printf()
    {
        $size = $this->getSize();
        $capacity = $this->getCapacity();
        $s = "Stack: size = $size, capacity = $capacity".PHP_EOL;
        $s .= "[";
        for ($i = 0; $i < $size; $i++) {
            $e = $this->array->get($i);
            if ($i == $size-1) {
                $s .= "$e";
            } else {
                $s .= "$e,";
            }
        }
        $s .= "]";
        echo $s;
    }
}