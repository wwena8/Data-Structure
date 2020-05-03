<?php
/**
 * Created by PhpStorm.
 * User: zhaoge
 * Date: 2020/5/2
 * Time: 6:24 下午
 */

namespace BST;

use StackAndQueue\ArrayQueue;
use StackAndQueue\ArrayStack;

class BST
{
    /**
     * @var Node $root
     */
    private $root;
    private $size;

    public function __construct()
    {
        $this->root = null;
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

    public function add($e)
    {
        $this->root = $this->add2($this->root, $e);
    }

    /**
     * @param Node $node
     * @param $e
     * 向以node为根的BST插入元素e，递归算法
     * 返回插入新节点后二分搜索树的根🌲🐶
     * @return Node
     */
    private function add2($node, $e)
    {
        if ($node == null) {
            $this->size++;
            return new Node($e);
        }
        if (substr_compare($e, $node->e, 0) < 0) {
            $node->left = $this->add2($node->left, $e);
        }
        if (substr_compare($e, $node->e, 0) > 0) {
            $node->right = $this->add2($node->right, $e);
        }
        return $node;
    }

    public function contains($e)
    {
        return $this->contains2($this->root, $e);
    }

    /**
     * @param Node $node
     * @param $e
     * @return bool
     * 判断以node为根的bst中是否包含元素为e的节点
     */
    private function contains2($node, $e)
    {
        if (!$node)
            return false;
        if (substr_compare($node->e, $e) == 0)
            return true;
        else if (substr_compare($e, $node->e) < 0)
            return $this->contains2($node->left, $e);
        else
            return $this->contains2($node->right, $e);
    }

    /**
     * 前序遍历二叉树
     */
    public function preOrder()
    {
        $this->preOrder2($this->root);
    }

    /**
     * @param Node $node
     */
    private function preOrder2($node)
    {
        if ($node != null) {
            echo $node->e." ";
            $this->preOrder2($node->left);
            $this->preOrder2($node->right);
        }
    }

    /**
     * 中序遍历
     */
    public function inOrder()
    {
        $this->inOrder2($this->root);
    }

    /**
     * @param Node $node
     */
    private function inOrder2($node)
    {
        if ($node == null)
            return;
        $this->inOrder2($node->left);
        echo $node->e;
        $this->inOrder2($node->right);
    }

    /**
     * 非递归的前序遍历
     */
    public function preOrderNr()
    {
        $stack = new ArrayStack();
        $stack->push($this->root);
        while (!$stack->isEmpty()) {
            /**
             * @var Node $current
             */
            $current = $stack->pop();
            echo $current->e;
            if ($current->right != null)
                $stack->push($current->right);
            if ($current->left != null)
                $stack->push($current->left);
        }
    }

    /**
     * 层级遍历
     */
    public function levelOrder()
    {
        if ($this->isEmpty())
            return;
        $queue = new ArrayQueue();
        $queue->enqueue($this->root);
        while (!$queue->isEmpty()) {
            /**
             * @var Node $current
             */
            $current = $queue->dequeue();
            echo $current->e;
            if ($queue->isEmpty())
                echo PHP_EOL;
            if ($current->left != null) {
                $queue->enqueue($current->left);
            }
            if ($current->right != null) {
                $queue->enqueue($current->right);
            }
        }
    }

    /**
     * @param Node $node
     * @param $depth
     * @param string $res
     */
    private function generateBST($node, $depth, $res='')
    {
        if ($node == null) {
            $res .= $this->generateDepth($depth)."null".PHP_EOL;
            echo $res;
            return $res;
        }
        $res .= $this->generateDepth($depth).$node->e.PHP_EOL;
        $this->generateBST($node->left, $depth+1, $res);
        $this->generateBST($node->right, $depth+1, $res);

    }

    /**
     * @param $depth
     * @return string
     */
    private function generateDepth($depth)
    {
        $res = "";
        for ($i = 0; $i < $depth; $i++)
            $res .= "--";
        return $res;
    }

    /**
     * @return Node|null
     * 返回bst最小值
     */
    public function minimum()
    {
        if ($this->isEmpty())
            return null;
        return $this->minimum2($this->root)->e;
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
        return $this->maximum2($this->root)->e;
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

    /**
     * @return Node|null
     */
    public function removeMax()
    {
        $e = $this->maximum();
        $this->root = $this->removeMax2($this->root);
        return $e;
    }

    /**
     * @param Node $node
     * @return Node
     * 删除以node为根的bst中的最小节点
     * 返回删除节点后新的bst的根
     */
    private function removeMax2($node)
    {
        if ($node->right == null) {
            $left_node = $node->left;
            $node->left = null;
            $this->size--;
            return $left_node;
        }
        $node->right = $this->removeMax2($node->right);
        return $node;
    }

    public function remove($e)
    {
        $this->root = $this->remove2($this->root, $e);
    }

    /**
     * @param Node $node
     * @param $e
     * @return null
     * 删除bst任意一个节点
     */
    private function remove2($node, $e)
    {
        if ($node == null)
            return null;
        if (substr_compare($e, $node->e) < 0) {
            $node->left = $this->remove2($node->left, $e);
            return $node;
        }
        if (substr_compare($e, $node->e) > 0) {
            $node->right = $this->remove2($node->right, $e);
            return $node;
        } else {
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

    public function printf()
    {
        $this->generateBST($this->root, 0);
    }
}

class Node
{
    public $e;
    /**
     * @var Node $left $right
     */
    public $left,$right;

    public function __construct()
    {
        $args = func_get_args();
        if ($args) {
            switch (count($args)) {
                case 1:
                    if (method_exists($this,$f = "__construct1"))
                        call_user_func(array($this, $f), $args[0]);
                    break;
            }
        }
    }

    public function __construct1($e)
    {
        $this->e = $e;
        $this->left = null;
        $this->right = null;
    }
}