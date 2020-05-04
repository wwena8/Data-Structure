<?php
/**
 * Created by PhpStorm.
 * User: zhaoge
 * Date: 2020/5/4
 * Time: 12:08 上午
 */

namespace SetAndMap;


use BST\BST;

class BSTMap implements Map
{

    /**
     * @var Node $root
     * @var int $size
     */
    private $root, $size;

    public function __construct()
    {
        $this->root = null;
        $this->size = 0;
    }

    public function add($key, $value)
    {
        $this->root = $this->add2($this->root, $key, $value);
    }

    /**
     * @param Node $node
     * @param $key
     * @param $value
     * @return Node
     * 向以node为根的bst中插入元素($key, $value)，并返回新插入节点的bst的根
     */
    private function add2($node, $key, $value)
    {
        if ($node == null) {
            $this->size++;
            return new Node($key, $value);
        } else {
            if (substr_compare($key, $node->key, 0) < 0)
                $node->left = $this->add2($node->left, $key, $value);
            if (substr_compare($key, $node->key, 0) > 0)
                $node->right = $this->add2($node->right, $key, $value);
        }
        return $node;
    }

    public function remove($key)
    {
        $node = $this->getNode($this->root, $key);
        if ($node) {
            $this->root = $this->remove2($this->root, $key);
            return $node;
        }
        return null;
    }

    /**
     * @param Node $node
     * @param $key
     * @return |null
     */
    private function remove2($node, $key)
    {
        if (!$node)
            return null;
        if (substr_compare($key, $node->key, 0) < 0) {
            $node->left = $this->remove2($node->left, $key);
            return $node;
        }
        if (substr_compare($key, $node->key, 0) > 0) {
            $node->right = $this->remove2($node->right, $key);
            return $node;
        }
        if (substr_compare($key, $node->key, 0) == 0) {
            if ($node->left == null) {
                $right_node = $node->right;
                $node->right = null;
                $this->size--;
                return $right_node;
            }
            if ($node->right == null) {
                $left_node = $node->left;
                $node->left = null;
                $this->size--;
                return $left_node;
            }
            $successor = $this->minimum2($node->right);
            $successor->right = $this->removeMin2($node->right);
            $successor->left = $node->left;
            $node->left = $node->right = null;
            return  $successor;
        }
    }

    /**
     * @return Node|null
     * 返回bst最小值
     */
    public function minimum()
    {
        if ($this->isEmpty())
            return null;
        return $this->minimum2($this->root)->key;
    }

    /**
     * @param Node $node
     * @return Node
     * 返回以node为根节点的最小值
     */
    private function minimum2($node)
    {
        if ($node->left == null)
            return $node;
        return $this->minimum2($node->left);
    }

    public function maximum()
    {
        if ($this->isEmpty())
            return null;
        return $this->maximum2($this->root)->key;
    }

    /**
     * @param Node $node
     * @return mixed
     */
    private function maximum2($node)
    {
        if ($node->right == null)
            return $node;
        return $this->maximum2($node->right);
    }

    /**
     * @return Node|null
     */
    public function removeMin()
    {
        $e = $this->minimum();
        $this->root = $this->removeMin2($this->root);
        return $e;
    }

    /**
     * @param Node $node
     * @return Node
     * 删除以node为根的bst中的最小节点
     * 返回删除节点后新的bst的根
     */
    private function removeMin2($node)
    {
        if ($node->left == null) {
            $right_node = $node->right;
            $node->right = null;
            $this->size--;
            return $right_node;
        }
        $node->left = $this->removeMin2($node->left);
        return $node;
    }


    public function contains($key)
    {
        return $this->getNode($this->root, $key) != null;
    }

    public function get($key)
    {
        return $this->getNode($this->root, $key);
    }

    public function set($key, $value)
    {
        $node = $this->getNode($this->root, $key);
        if (!$node)
            return;
        $node->value = $value;
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
     * @param Node $node
     * @param $key
     * @return Node|null |null
     */
    public function getNode($node, $key)
    {
        if (!$node)
            return null;
        if (substr_compare($key, $node->key, 0) == 0)
            return $node;
        if (substr_compare($key, $node->key, 0) < 0)
            return $this->getNode($node->left, $key);
        if (substr_compare($key, $node->key, 0) > 0)
            return $this->getNode($node->right, $key);
    }
}

class Node
{
    public $key, $value;
    /**
     * @var Node $left $right
     */
    public $left,$right;

    public function __construct()
    {
        $args = func_get_args();
        if ($args) {
            switch (count($args)) {
                case 2:
                    if (method_exists($this,$f = "__construct1"))
                        call_user_func(array($this, $f), $args[0], $args[1]);
                    break;
            }
        }
    }

    public function __construct1($key, $value)
    {
        $this->key = $key;
        $this->value = $value;
        $this->left = null;
        $this->right = null;
    }
}