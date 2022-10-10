<?php

namespace Criss\Demo;

use Criss\PhpAlgorithm;

require_once "../src/Stack.php";

/**
 * 匹配括弧
 */
function matchBrackets($str)
{
    $stack = new PhpAlgorithm\Stack();
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

/**
 * @Description 用数组来实现
 *
 * @param $str
 * @return bool
 */
function matchBracketsByArray($str)
{
    $array = [];
    $len = strlen($str);

    for ($i = 0; $i < $len; $i ++) {
        if ($str[$i] == "{") {
            array_unshift($array, $str[$i]);
        } else {

            //判断是否为空
            if (empty($array)) {
                return false;
            } else {
                array_shift($array);
            }
        }
    }

    if (empty($array)) {
        return true;
    } else {
        return false;
    }
}


//$str = "{{{}}}";
//
//$check = matchBrackets($str);
//
//var_dump($check);
//
//$check2 = matchBracketsByArray($str);
//
//var_dump($check2);

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
 */
function tenToBinary($num) : string
{
    $stack = new PhpAlgorithm\Stack();

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

//$num = 255;
//echo tenToBinary($num);


/**
 *  前序，中序，后序表达式
 *  从右到左扫描表达式，将数字压入堆栈
    遇到运算符时，弹出栈顶的两个数，进行运算
    注意顺序为：栈顶元素 -操作符->次顶元素
    并将结果入栈；重复上述过程直到表达式最右端
    最后运算得出的值即为最终结果
 *  前缀表达式： (3 + 4) * 5 - 6 ==>  -*+3456
 *  中缀表达式： (3 + 4) * 5 - 6 ==>  (3 + 4) * 5 - 6
 *  从左往右扫描表达式，遇到数字时，将数字压入堆栈
    遇到运算符时，弹出栈顶的两个数，计算
    注意顺序：次顶元素 -处理->栈顶元素
    并将结果入栈，重复上述过程直到表达式最右端
    最后结果即为计算结果
 *  后缀表达式： (3 + 4) * 5 - 6 ==>  34+5*6-
 */

class Poland
{
    private $middle;

    private $front;

    private $back;

    private $stack;

    private $array;

    private $list = [0,1,2,3,4,5,6,7,8,9];

    public function __construct($str)
    {
        $this->middle = $str;

        $len = strlen($str);

        //中缀表达式拆成数组
        for ($i = 0; $i < $len; $i++) {
            $this->array[] = $str[$i];
        }

        $this->stack = new PhpAlgorithm\Stack();
    }

    /**
     * @Description 中缀表达式输出
     */
    public function toMiddle()
    {
        return $this->middle;
    }

    /**
     * @Description 前缀表达式输出
     *
     * 中缀表达式转化为前缀表达式，从右到左：
     *
    *  1.设定运算符栈；
       2.从右到左遍历中缀表达式的每个数字和运算符；
       3.若当前字符是数字，则直接输出成为前缀表达式的一部分；
       4.若当前字符为运算符，则判断其与栈顶运算符的优先级，若优先级大于栈顶运算符，则进栈；若优先级小于栈顶运算符，退出栈顶运算符成为前缀表达式的一部分，然后将当前运算符放入栈中；
       5.若当前字符为“)”，进栈；
       6.若当前字符为“(”，则从栈顶起，依次将栈中运算符出栈成为前缀表达式的一部分，直到碰到“)”。将栈中“)”出栈，不需要成为前缀表达式的一部分，然后继续扫描表达式直到最终输出前缀表达式为止
    **/
    public function toFront() : string
    {
        $len = count($this->array);

        $temp = "";

        //从右到左遍历
        for ($i = $len - 1; $i >= 0; $i --) {
            if (in_array($this->array[$i],$this->list)) {
                $temp = $this->array[$i] . $temp;
            } else {
                if ($this->stack->isEmpty()) {
                    $this->stack->push($this->array[$i]);
                } else {
                    //判断当前字符
                    if ($this->array[$i] == ")") {
                        $this->stack->push($this->array[$i]);
                    } else {
                        if ($this->array[$i] == "*" || $this->array[$i] == "\\") {
                            $this->stack->push($this->array[$i]);
                        } else {
                            if (in_array($this->array[$i] , ["+","-"]) && in_array($this->stack->peek(),['*', "//"])) {
                                $temp = $this->array[$i] . $temp;
                            } else {
                                if ($this->array[$i] == "(") {
                                    while ($this->stack->peek() != ")") {
                                        $temp = $this->stack->pop() . $temp;
                                    }
                                    $this->stack->pop();
                                } else {
                                    $this->stack->push($this->array[$i]);
                                }
                            }
                        }
                    }
                }
            }
        }

        return $temp;

    }

    /**
     * @Description 后缀表达式输出
     *
     *  1.设定运算符栈；
        2.从左到右遍历中缀表达式的每个数字和运算符；
        3.若当前字符是数字，则直接输出成为后缀表达式的一部分；
        4.若当前字符为运算符，则判断其与栈顶运算符的优先级，若优先级大于栈顶运算符，则进栈；若优先级小于栈顶运算符，退出栈顶运算符成为后缀表达式的一部分，然后将当前运算符放入栈中；
        5.若当前字符为“(”，进栈；
        6.若当前字符为“)”，则从栈顶起，依次将栈中运算符出栈成为后缀表达式的一部分，直到碰到“(”。将栈中“(”出栈，不需要成为后缀表达式的一部分，然后继续扫描表达式直到最终输出后缀表达式为止
     *
     */


    public function toBack()
    {

    }

    /**
     * @Description 中缀表达式求和
     */
    public function sumMiddle()
    {

    }

    /**
     * @Description 前缀表达式求和
     *   从右到左扫描表达式，将数字压入堆栈
            遇到运算符时，弹出栈顶的两个数，进行运算
            注意顺序为：栈顶元素 -操作符->次顶元素
            并将结果入栈；重复上述过程直到表达式最右端
            最后运算得出的值即为最终结果
     */
    public function sumFront()
    {

    }

    /**
     * @Description 后缀表达式求和
     *
     *从左往右扫描表达式，遇到数字时，将数字压入堆栈
        遇到运算符时，弹出栈顶的两个数，计算
        注意顺序：次顶元素 -处理->栈顶元素
        并将结果入栈，重复上述过程直到表达式最右端
        最后结果即为计算结果
     *
     */
    public function sumBack()
    {

    }

}