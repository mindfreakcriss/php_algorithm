<?php

namespace Criss\PhpAlgorithm;

class BinaryTree
{
    private $root;

    private $left_child;

    private $right_child;

    public function __construct($data)
    {
        $this->root = $data;
        $this->left_child = null;
        $this->right_child = null;
    }

    /**
     * @Description 设置根节点的值
     *
     * @param $newVal
     */
    public function setRootVal($newVal)
    {
        $this->root = $newVal;
    }

    /**
     * @Description 插入左子树，都是针对于根节点处理，不是叶节点，所以之前的数据会被"顶"下去
     *
     * @param int|string|object $newNode 新的节点
     */
    public function insertLeft($newNode)
    {
        $t = new BinaryTree($newNode);

        if (!empty($this->left_child)) {
            $t->left_child = $this->left_child;
        }

        $this->left_child = $t;
    }

    /**
     * @Description 插入右子树，都是针对于根节点处理，不是叶节点，所以之前的数据会被"顶"下去
     *
     * @param int|string|object $newNode 新的节点
     */
    public function insertRight($newNode)
    {
        $t = new BinaryTree($newNode);

        if (!empty($this->right_child)) {
            $t->right_child = $this->right_child;
        }

        $this->right_child = $t;
    }

    /**
     * @Description 获取根节点的值
     *
     * @return mixed
     */
    public function getRootVal()
    {
        return $this->root;
    }

    /**
     * @Description 获取左子树
     *
     * @return mixed
     */
    public function getLeftChild()
    {
        return $this->left_child;
    }

    /**
     * @Description 获取右子树
     *
     * @return mixed
     */
    function getRightChild()
    {
        return $this->right_child;
    }
}