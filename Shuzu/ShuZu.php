<?php
/**
 * Created by PhpStorm.
 * User: zhaoge
 * Date: 2020/4/25
 * Time: 5:07 下午
 */
namespace Shuzu;

use SplFixedArray;
class ShuZu
{
    /**
     * @var
     * 类成员变量私有
     */
    private $data;
    private $size;

    /**
     * ShuZu constructor.
     * 无参构造函数
     */
    public function __construct()
    {
        $a = func_get_args(); //获取构造函数中的参数
        if (!$a) {
            $this->data = new SplFixedArray(10);
            $this->size = 0;
        } else {
            $i = count($a);
            if (method_exists($this,$f='__construct'.$i)) {
                call_user_func_array(array($this,$f),$a);
            }
        }
    }

    public function __construct1($capacity)
    {
        $this->data = new SplFixedArray($capacity);
        $this->size = 0;
    }

    /**
     * @return mixed
     * 获取数组元素个数
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @return int
     * 获取数组的容量
     */
    public function getCapacity()
    {
        return count($this->data);
    }

    /**
     * @param $index
     * @return mixed
     * 获取索引为index数值
     */
    public function get($index)
    {
        if ($this->indexWrong2($index)) {
            echo "index is wrong".PHP_EOL;
            exit(-1);
        }
        return $this->data[$index];
    }

    public function set($index, $e)
    {
        if ($this->indexWrong($index)) {
            echo "index is wrong".PHP_EOL;
            exit(-1);
        }
        return $this->data[$index] = $e;
    }

    /**
     * @return bool
     * 判断数组是否为空
     */
    public function isEmpty()
    {
        return $this->size == 0;
    }

    /**
     * @return bool
     * 判断数组是否为满
     */
    public function isFull()
    {
        return $this->size == count($this->data);
    }

    /**
     * @param $index
     * @return bool
     * 增加判断索引是否正确
     */
    public function indexWrong($index)
    {
        return ($index < 0) || ($index > $this->size);
    }

    /**
     * @param $index
     * @return bool
     * get时判断索引是否正确
     */
    public function indexWrong2($index)
    {
        return ($index < 0) || ($index >= $this->size);
    }

    /**
     * @param $e
     * 数组头部添加元素 O(n)
     */
    public function addFirst($e)
    {
        $this->add(0, $e);
    }

    /**
     * @param $e
     * 数组尾部添加元素 O(1)
     */
    public function addLast($e)
    {
        $this->add($this->size, $e);
    }

    /**
     * @param $index
     * @param $e
     * 在index位置处插入元素e O(n)
     */
    public function add($index, $e)
    {
        if ($this->isFull()) {
            $this->resize();
        }
        if ($this->indexWrong($index)) {
            echo "index is wrong".PHP_EOL;
            exit(-1);
        }
        for ($i = $this->size-1; $i >= $index; $i--) {
            $this->data[$i+1] = $this->data[$i];
        }
        $this->data[$index] = $e;
        $this->size++;
    }

    /**
     * @param $e
     * @return bool
     * 判断元素是否存在
     */
    public function contains($e)
    {
        for ($i = 0; $i < $this->size; $i++) {
            if ($this->data[$i] == $e)
                return true;
        }
        return false;
    }

    /**
     * @param $e
     * @return int
     * 查找元素索引
     */
    public function find($e)
    {
        for ($i = 0; $i < $this->size; $i++) {
            if ($this->data[$i] == $e)
                return $i;
        }
        return -1;
    }

    /**
     * @param $index
     * @return mixed
     * 删除并返回第index个元素
     */
    public function remove($index)
    {
        if ($this->indexWrong($index)) {
            echo "index is wrong".PHP_EOL;
            exit(-1);
        }
        $r = $this->data[$index];
        for ($i = $index; $i < $this->size; $i++) {
            $this->data[$i] = $this->data[$i+1];
        }
        $this->size--;
        return $r;
    }

    /**
     * @return mixed
     * 删除第一个元素
     */
    public function removeFirst()
    {
        return $this->remove(0);
    }

    /**
     * @return mixed
     * 删除最后一个元素
     */
    public function removeLast()
    {
        return $this->remove($this->size-1);
    }

    /**
     * 动态数组扩容
     */
    public function resize()
    {
        $new_data = new SplFixedArray(count($this->data)*2);
        for($i = 0; $i<$this->size; $i++) {
            $new_data[$i] = $this->data[$i];
        }
        $this->data = $new_data;
    }

    /**
     * 打印输出数组信息
     */
    public function printf()
    {
        $capacity = count($this->data);
        $s = "Array: size = $this->size, capacity = $capacity".PHP_EOL;
        $s .= "[";
        for ($i = 0; $i < $this->size; $i++) {
            $e = $this->data[$i];
            if ($i == $this->size-1) {
                $s .= "$e";
            } else {
                $s .= "$e,";
            }
        }
        $s .= "]";
        echo $s;
    }
}
