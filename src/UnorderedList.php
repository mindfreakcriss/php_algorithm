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
        $temp = $this->head; //查询数据
        $pre = $this->head; //前面迭代

        //先判断头
        if ($temp->getData() == $target) {
            $this->head = $temp->getNext();
            return true;
        } else {
            while ($temp != null) {
                if ($temp->getData() == $target) {
                    $pre->setNext($temp->getNext());
                    $this->length--;
                    return true;
                }
                $pre = $temp;
                $temp = $temp->getNext();
            }
        }
        return false;
    }

    /**
     * @Description 输出一个链表
     *
     */
    public function show()
    {
        $temp = $this->head;

        if ($this->length == 0) {
            echo "链表为空";
        } else {
            $i = 0;
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
     * @return int
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
        return $index;
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
        $pre = $this->head;

        $node = new Node($item);

        if ($pos != 0) {
            for ($i = 0; $i < $pos; $i++) {
                $pre = $temp;
                $temp = $temp->getNext();
            }
            //判断下一个节点是否为空
            $node->setNext($temp);
            $pre->setNext($node);
        } else {
            $node->setNext($temp);
            $this->head = $node;
        }
    }

    /**
     * @Description 移除最后一个元素
     */
    public function pop()
    {
        $temp = $this->head;
        $pre = $this->head;

        while ($temp->getNext() != null) {
            $pre = $temp;
            $temp = $temp->getNext();
        }

        $pre->setNext(null);
    }

    /**
     * @Description 假设 pos 为合理值，删除该下标元素 快慢指针
     * @param $pos
     */
    public function popByPos($pos)
    {
        $temp = $this->head;
        $pre = $this->head;

        if ($pos != 0) {
            for ($i = 0; $i < $pos; $i++) {
                $pre = $temp;
                $temp = $temp->getNext();
            }
        }

        if ($temp->getNext() == null) {
            $pre->setNext(null);
        } else {
            $pre->setNext($temp->getNext());
        }
    }
}
