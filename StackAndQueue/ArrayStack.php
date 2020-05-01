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

    /**
     * @return mixed
     * 栈大小
     */
    public function getSize()
    {
        return $this->array->getSize();
    }

    /**
     * @return bool
     * 栈是否为空
     */
    public function isEmpty()
    {
        return $this->array->isEmpty();
    }

    /**
     * @return int
     * 栈容量
     */
    public function getCapacity()
    {
        return $this->array->getCapacity();
    }

    /**
     * @param $e
     * 入栈
     */
    public function push($e)
    {
        $this->array->addLast($e);
    }

    /**
     * @return mixed
     * 出栈
     */
    public function pop()
    {
        return $this->array->removeLast();
    }

    /**
     * @return mixed
     * 返回栈顶元素
     */
    public function peek()
    {
        return $this->array->getLast();
    }

    /**
     * @param $s
     * @return bool
     * 括号匹配问题
     */
    public function isValid($s)
    {
        $stack = new ArrayStack();
        $chars = str_split($s);
        foreach ($chars as $char) {
            if (in_array($char, ['[','{','('])) {
                $stack->push($char);
            } else {
                if ($stack->peek() == '[' && $char == ']')
                    $stack->pop();
                if ($stack->peek() == '{' && $char == '}')
                    $stack->pop();
                if ($stack->peek() == '(' && $char == ')')
                    $stack->pop();
            }
        }
        return $stack->isEmpty();
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
        $s .= "] top";
        echo $s;
    }
}