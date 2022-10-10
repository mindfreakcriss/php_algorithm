<?php

namespace Criss\PhpAlgorithm;

class Queue
{
    private $queue;

    public function __construct()
    {
        $this->queue = [];
    }

    /**
     * @Description 队列末端添加一个元素，无返回值
     *
     * @param $item
     */
    public function enqueue($item)
    {
        array_push($this->queue, $item);
    }

    /**
     * @Description 头部移除一个元素，改变队列内容，无返回值
     */
    public function dequeue()
    {
        return array_shift($this->queue);
    }

    /**
     * @Description 判断是否为空
     */
    public function isEmpty() : bool
    {
        if (empty($this->queue)) {
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
        return count($this->queue);
    }

}