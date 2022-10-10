<?php

namespace Criss\PhpAlgorithm;

include_once "../src/Stack.php";

/**
 * @Description 匹配括号
 * @Description 一对合格的括号必须是 { }  的形式
 * @param string $str 输入的字符串
 * @return bool
 */
function matchBrackets($str)
{
    $stack = new Stack();
    //字符串划分为数组
    $len = strlen($str);
    for ($i = 0; $i < $len; $i++) {
        //如果是左括号就入栈
        if ($str[$i] == "{") {
            $stack->push($str[$i]);
        } else {
            //如果栈不为空，出栈，为空，返回错误
            if ($stack->isEmpty()) {
                return false;
            } else {
                $stack->pop();
            }
        }
    }

    //全部走一次之后，栈为空，则匹配，否则，就不匹配
    if ($stack->isEmpty()) {
        return true;
    } else {
        return false;
    }
}

$str = "{{{}}}";

$check = matchBrackets($str);

var_dump($check);