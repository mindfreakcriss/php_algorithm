<?php

namespace Criss\PhpAlgorithm;

class UnorderedList
{
    private $head;

    private $length;

    public function __construct()
    {
        $this->head = null;
        $this->length = 0;
    }

    /**
     * @Description 链表是否为空
     *
     * @return bool
     */
    public function isEmpty() : bool
    {
        if ($this->length == 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @Description 头插入一个元素
     *
     * @param $data
     */
    public function add($data)
    {
        $temp = new Node($data);

        $temp->setNext($this->head);

        $this->head = $temp;
        $this->length++;

    }

    /**
     * @Description 计算链表的长度
     *
     * @return int
     */
    public function length() : int
    {
        $temp = $this->head;

        $count = 0;

        while ($temp != null) {
            $count ++;
            $temp = $temp->getNext();
        }
        return $count;
    }

    /**
     * @Description 搜索元素
     *
     * @param $target
     * @return bool
     */
    public function search($target) : bool
    {
        $temp = $this->head;

        while ($temp != null) {
            if ($temp->getData() == $target) {
                return true;
            } else {
                $temp = $temp->getNext();
            }
        }

        return false;
    }

    /**
     * @Description 删除一个元素
     *
     * @param $target
     * @return bool
     */
    public function remove($target) : bool
    {
        $temp = $this->head;

        if ($this->length == 1 && $temp->getData() == $target) {
            $this->head = null;
            $this->length--;
            return true;
        }

        while($temp != null && $temp->getNext() != null) {
            if ($temp->getNext()->getData() == $target) {
                $temp->setNext($temp->getNext()->getNext());
                $this->length--;
                return true;
            }
        }
        return false;
    }

    /**
     * @Description 输出一个链表
     *
     * @return string|null
     */
    public function show() : ? string
    {
        $temp = $this->head;

        if ($this->length == 0) {
            return "链表为空";
        } else {
            $i = 1;
            while ($temp != null) {
                $str = sprintf("链表第%s个数据为%s\n",$i, $temp->getData());
                echo $str;
                $i++;
                $temp = $temp->getNext();
            }
        }
    }

    /**
     * @Description 尾插法一个元素
     *
     * @param $item
     */
    public function append($item)
    {
        $temp = $this->head;

        while ($temp->getNext() != null) {
            $temp = $temp->getNext();
        }

        $node = new Node($item);

        $temp->setNext($node);
    }

    /**
     * @Description 假设元素在链表里面，返回下标
     *
     * @param $item
     */
    public function index($item) : int
    {
        $temp = $this->head;
        $index = 0;
        while ($temp != null) {
            if ($temp->getData() == $item) {
                return $index;
            } else {
                $index ++;
                $temp = $temp->getNext();
            }
        }
    }

    /**
     * @Description 假设元素不在链表中，pos 为合理值，插入元素
     *
     * @param int $pos
     * @param  $item
     */
    public function insert(int $pos, $item)
    {
        $temp = $this->head;

        if ($pos != 0) {
            for ($i = 0; $i <= $pos; $i++) {
                $temp = $temp->getNext();
            }
        }

        $node = new Node($item);

        //判断下一个节点是否为空
        if ($temp->getNext() == null) {
            $temp->setNext($node);
        } else {
            $node->setNext($temp->getNext());
            $temp->setNext($node);
        }
    }

    /**
     * @Description 移除最后一个元素
     */
    public function pop()
    {
        $temp = $this->head;

        while ($temp->getNext() != null) {
            $temp = $temp->getNext();
        }

        $temp->setNext(null);
    }

    /**
     * @Description 假设 pos 为合理值，删除该下标元素 快慢指针
     * @param $pos
     */
    public function popByPos($pos)
    {
        $temp = $this->head;
        $next = $this->head;

        if ($pos != 0) {
            for ($i = 0; $i <= $pos; $i++) {
                $next = $temp;
                $temp = $temp->getNext();
            }
        }

        if ($temp->getNext() == null) {
            $next->setNext(null);
        } else {
            $next->setNext($temp->getNext());
        }
    }
}
