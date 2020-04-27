<?php
/**
 * Created by PhpStorm.
 * User: zhaoge
 * Date: 2020/4/25
 * Time: 6:32 下午
 */

namespace core;
class Util
{
    public static $classMap = array();
    /**
     * @param $class
     * @return bool
     * 自动加载类
     */
    public static function load($class)
    {
        if (isset($classMap[$class])) {
            return true;
        } else {
            $class = str_replace('\\', '/', $class);
            $file = DS.'/'.$class.'.php';

            if (is_file($file)) {
                include $file;
                self::$classMap[$class] = $class;
                return true;
            } else {
                return false;
            }
        }
    }
}