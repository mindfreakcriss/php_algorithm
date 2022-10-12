<?php

namespace Criss\PhpAlgorithm;

include_once "../src/BinaryTree.php";
include_once "../src/Stack.php";

# 构建解析树的规则

/**
 *  1: 如果当前标记是 ( , 就为当前节点添加一个左子节点，并下沉到该子节点
 *  2：如果当前标记在列表["+', '-','/','*']中，就将当前节点的值设为当前标记对应的运算符，为当前节点添加一个右节点，并下沉到该子节点
 *  3：如果当前标记是数字，就将当前节点的值设为这个数，并返回到父节点
 *  4：如果当前标记是 ) , 就跳到当前节点的父节点
 *  ** 如何追踪父节点：用栈记录父节点，下沉子节点的时候，把当前节点压入栈，返回就弹出
 */

/**
 * @Description 利用二叉树输出计算表达式
 *
 * 例如：( 3 + (4 * 5 ) )
 *    -->
 *            +
 *         3    *
 *            4   5
 * @param string $str 字符串会调整为 数组 ： [ "(", "3" , "+", "(" , "4" , "*", "5" ,")", ")"]
 */
function countData($str)
{
    $array = explode(" ", $str);
    $stack = new Stack();
    $result = new BinaryTree("");

    $current = $result;

    for ($i = 0; $i < count($array) ; $i ++) {
        $arr = $array[$i];
        switch ($arr) {
            case "(":
                $current->insertLeft("");
                $stack->push($current);
                $current = $current->getLeftChild();
                break;
            case "+":
            case "*":
            case "-":
            case "\\":
                $current->setRootVal($arr);
                $current->insertRight("");
                $stack->push($current);
                $current = $current->getRightChild();
                break;
            case ")":
                $current = $stack->pop();
                break;
            default:
                $current->setRootVal($arr);
                $current = $stack->pop();
                //拿当前的节点
                break;
        }
    }
    return $result;
}

$str = "( 3 + ( 4 * 5 ) )";

$current = countData($str);


