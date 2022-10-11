<?php

namespace Criss\PhpAlgorithm;

class Sort
{
    /**
     * @Description 冒泡排序
     * 嵌套的循环交换，换位置的消耗比较多 n^2 次交换
     *
     * @param $array
     * @return array
     */
    public static function bubbleSort( &$array) : array
    {
        $len = count($array);
        for ($i = 0; $i < $len; $i++) {
            for ($j = $i + 1; $j < $len ; $j++) {
                if ($array[$i] < $array[$j]) {
                    $temp = $array[$j];
                    $array[$j] = $array[$i];
                    $array[$i] = $temp;
                }
            }
        }
        return $array;
    }

    /**
     * @Description 选择排序
     *
     * @param $array
     */
    public static function chooseSort(&$array) : array
    {
        $len = count($array);

        for ($i = 0; $i < $len; $i++) {

            $max = $i;
            for ($j = $i + 1; $j < $len; $j++) {
                if ($array[$max] < $array[$j]) {
                    $max = $j;
                }
            }

            $temp = $array[$max];
            $array[$max] = $array[$i];
            $array[$i] = $temp;
        }

        return $array;
    }

    /**
     * @Description 插入排序
     * 也是循环交换，先定义第一个为最大值，遇到最大值的时候，前面的数据进行交换
     *
     * @param $array
     * @return array
     */
    public static function insertSort(&$array) : array
    {
        $len = count($array);

        for ($i = 0; $i < $len; $i++) {
            for ($j = $i; $j > 0; $j--) {
                if ($array[$j - 1] < $array[$j]) {
                    $temp = $array[$j];
                    $array[$j] = $array[$j - 1];
                    $array[$j-1] = $temp;
                }
            }
        }

        return $array;
    }

    public static function shellSort($array)
    {

    }

    public static function mergeSort($array)
    {

    }

    public static function quickSort($array)
    {

    }

    public static function binarySort($array)
    {

    }
}