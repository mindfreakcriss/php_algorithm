<?php

namespace Criss\PhpAlgorithm;

/**
 * @Class Stack 栈的PHP实现
 */
class Stack
{
    /**
     * @var array 栈的内部存储
     */
    private $array;

    /**
     * @Description 构造函数
     */
    public function __construct()
    {
        $this->array = [];
    }

    /**
     * @Description 将一个元素压入栈的顶端
     *
     * @param string|int|object|double $item 栈的元素
     */
    public function push($item)
    {
        array_unshift($this->array,$item);
    }

    /**
     * @Description 将栈顶元素移除，返回栈顶元素，并且改变栈
     */
    public function pop()
    {
        return array_shift($this->array);
    }

    /**
     * @Description 返回栈顶元素，但不移除
     */
    public function peek()
    {
        return $this->array[array_key_first($this->array)];
    }

    /**
     * @Description 是否为空栈
     *
     * @return bool 空为true
     */
    public function isEmpty() : bool
    {
        if (empty($this->array)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @Description 返回栈的数目
     */
    public function size() : int
    {
        return count($this->array);
    }
}