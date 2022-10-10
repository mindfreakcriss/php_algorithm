<?php

namespace Criss\PhpAlgorithm;

class Deque
{
    private $deque;

    public function __construct()
    {
        $this->deque = [];
    }

    /**
     * @Description 队列前端增加一个数据
     *
     * @param $item
     */
    public function addFront($item)
    {
        array_unshift($this->deque, $item);
    }

    /**
     * @Description 队列末端增加一个数据
     *
     * @param $item
     */
    public function addRear($item)
    {
        array_push($this->deque, $item);
    }

    /**
     * @Description 队列前端移除一个元素，改变队列结构
     */
    public function removeFront()
    {
        array_shift($this->deque);
    }

    /**
     * @Description 队列末端移除一个元素，改变队列结构
     */
    public function removeRear()
    {
        array_pop($this->deque);
    }

    /**
     * @Description 判断是否为空
     */
    public function isEmpty() : bool
    {
        if (empty($this->deque)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @Description 返回队列大小
     */
    public function size() : int
    {
        return count($this->deque);
    }
}