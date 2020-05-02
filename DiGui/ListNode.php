<?php
/**
 * Created by PhpStorm.
 * User: zhaoge
 * Date: 2020/5/2
 * Time: 5:43 下午
 */
namespace DiGui;

class ListNode
{
    public $val;
    public $next;

    public function __construct()
    {
        $args = func_get_args();
        if ($args) {
            switch (count($args)) {
                case 1:
                    if (method_exists($this,$f='__construct1')) {
                        call_user_func_array(array($this,$f),$args);
                    }
                    break;
                default:
                    exit(-1);
            }
        }
    }

    public function __construct1($x)
    {
        $this->val = $x;
    }

    public function out()
    {
        echo $this->val;
    }
}