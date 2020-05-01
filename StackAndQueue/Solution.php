<?php
/**
 * Created by PhpStorm.
 * User: zhaoge
 * Date: 2020/5/1
 * Time: 10:16 上午
 */
namespace StackAndQueue;
class Solution
{
    /**
     * @param $s
     * @return bool
     * 判断括号匹配问题
     */
    public function isValid($s)
    {
        $stack = new ArrayStack();
        $chars = str_split($s);
        foreach ($chars as $char) {
            if (in_array($char, ['[','{','('])) {
                $stack->push($char);
            } else {
                if ($stack->isEmpty())  //弹栈先判空
                    return false;
                $c = $stack->pop(); //拿弹出来的跟
                if ($c == '[' && $char != ']')
                    return false;
                if ($c == '{' && $char != '}')
                    return false;
                if ($c == '(' && $char != ')')
                    return false;
            }
        }
        return $stack->isEmpty();
    }
}