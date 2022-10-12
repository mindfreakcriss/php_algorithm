<?php

namespace Criss\PhpAlgorithm;

/**
 * @Description 堆的有序性，对于堆中任意元素x及其父元素p, p都不大于x
 *
 * * 由于树是完全的，对于任意位置p 来说，左节点是 2p, 右子节点是 2p+1
 * * 给定的列表位置 n 的节点，父节点的位置就是  n / 2 -> 整除的出
 *
 */
class BinaryHeap
{
    private $heapList = [];
    private $currenSize = 0;

    public function __construct()
    {
        $this->heapList[] = 0; //方便计算
    }

    public function show()
    {
        var_dump($this->heapList);
    }

    /**
     * @Description 最小堆数据上升
     *
     * @param int $i 下标
     */
    private function goUp($i)
    {
        $newNum = $this->heapList[$i];
        while ($i > 0) {
            $parent = $i / 2;

            //判断父节点和当前节点谁大
            if ($newNum < $this->heapList[$parent]) {
                //换
                $temp = $this->heapList[$i];
                $this->heapList[$i] = $this->heapList[$parent];
                $this->heapList[$parent] = $temp;
            } else {
                $i = $parent;
            }
        }
    }

    /**
     * @Description 最小堆下转
     *
     * @param int $i 顶端的下标
     */
    private function goDown($i)
    {
        while ( ($i * 2) <= $this->size() ) {
            $min = $this->getMin($i);
            if ($this->heapList[$i] > $this->heapList[$min]) {
                $temp = $this->heapList[$i];
                $this->heapList[$i] = $this->heapList[$min];
                $this->heapList[$min] = $temp;
            }
            $i = $min;
        }
    }

    /**
     * @Description 一个子树获取最小的值的下标
     *
     * @param $i
     * @return float|int
     */
    private function getMin($i)
    {
        if ($i * 2 + 1 > $this->size()) {
            return $i * 2;
        } else {
            //判断左节点还是右节点小
            if ($this->heapList[$i * 2]  < $this->heapList[$i * 2 + 1]) {
                return $i * 2;
            } else {
                return $i * 2 + 1;
            }
        }
    }


    /**
     * @Description 往堆插入新元素
     *
     * @param $k
     */
    public function insert($k)
    {
        $this->heapList[] = $k;
        $this->currenSize ++;
        $this->goUp($this->currenSize);
    }

    /**
     * @Description 返回最小元素，元素留在堆中
     */
    public function findMin()
    {
        return $this->heapList[1];
    }

    /**
     * @Description 返回最小元素，并且删除该元素
     */
    public function delMin()
    {
        $ret = $this->heapList[1];//最小的元素

        //把最后一个值放上去
        $this->heapList[1] = $this->heapList[$this->size()];

        //当前的长度
        $this->currenSize --;

        //删除最后一个元素
        array_pop($this->heapList);

        $this->goDown(1);

        return $ret;
    }

    /**
     * @Description 堆为空的时候，返回 true , 否则为false
     */
    public function isEmpty() : bool
    {
        if ($this->size() == 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @Description 返回堆中元素的个数
     */
    public function size() : int
    {
        return $this->currenSize;
    }

    /**
     * @Description 根据一个数组创建堆, 把数据作为默认的堆，然后进行数据下转
     *
     * @param $array
     */
    public function buildHeap($array)
    {
        $length = count($array);
        //找出父节点
        $parent = $length / 2;
        //堆的长度
        $this->currenSize = $length;
        //最开始的数据
        $this->heapList = array_merge($this->heapList, $array);

       while ($parent > 0) {
            $this->goDown($parent);
            $parent --;
       }
    }
}