<?php

namespace Criss\PhpAlgorithm;

include_once "../src/Stack.php";


/**
 * 十进制转化为二进制，利用短除法，高位短除2，余数记录，然后倒序写出来例如：
 *
 *      255 = 11111111(2)
 *       计算过程
 *      2  |255 ---- 1
 *      2  |127 ---- 1
 *      2  | 63 ---- 1
 *      2  | 31 ---- 1
 *      2  | 15 ---- 1
 *      2  | 7  ---- 1
 *      2  | 3  ---- 1
 *           1  ---- 1
 *     然后倒序写回去
 * 前序，中序，后序表达式
 */
function tenToBinary($num) : string
{
    $stack = new Stack();

    while ($num > 1) {
        $stack->push($num % 2);
        $num = intdiv($num, 2);
    }
    $stack->push($num);

    //输出
    $str = "";
    while(!$stack->isEmpty()) {
        $str .= $stack->pop();
    }

    return $str."(2)";
}

$num = 255;
echo tenToBinary($num);