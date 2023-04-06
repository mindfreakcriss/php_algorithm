<?php

namespace Criss\PhpAlgorithm;

class CircleQueue
{
    /**
     * @var array $_array 循环队列的数组
     */
    private $_array = [];

    /**
     * @var int $_front 循环队列的头
     */
    private $_front = 0;

    /**
     * @var int $_rear 循环队列的尾
     */
    private $_rear = 0;

    /**
     * @var int $_size 循环队列的大小
     */
    private $_size = 0;

    public function __construct($size)
    {
        $this->_size = $size;
        for ($i = 0; $i < $size; $i++) {
            $this->_array[$i] = null;
        }
    }

    /**
     * @Description 循环队列的长度
     * @author kb.huang
     * @date 2023-04-06
     *
     * @return int
     */
    public function length()
    {
        return ( $this->_rear - $this->_front + $this->_size ) % $this->_size;
    }

    /**
     * @Description 循环队列入队
     *
     * @param $item
     * @return void
     */
    public function enQueue($item)
    {
        if (($this->_rear + 1) % $this->_size == $this->_front) {
            echo "the queue is full";
        } else {
            $this->_array[$this->_rear] = $item;
            $this->_rear = ($this->_rear + 1) % $this->_size;
        }
    }


    /**
     * @Description 循环队列出队
     *
     * @return mixed|void|null
     */
    public function popQueue()
    {
        if ($this->_rear == $this->_front) {
            echo "the queue is empty";
        } else {
            $data = array_shift($this->_array);
            $this->_array[$this->_front] = null;//删除操作
            $this->_front = ($this->_front + 1 ) % $this->_size;
            return $data;
        }
    }
}