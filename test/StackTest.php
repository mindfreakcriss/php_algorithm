<?php

namespace Criss\PhpAlgorithm;

use PHPUnit\Framework\TestCase;

class StackTest extends TestCase
{
    public function testStack() : void
    {
        $stack = new Stack();

        //初始化数组长度为0
        $this->assertSame(0, $stack->size());

        //初始化为空
        $this->assertSame(true, $stack->isEmpty());

        //栈顶压入一个元素
        $stack->push("stack");
        $this->assertSame(false, $stack->isEmpty());
        $this->assertSame(1,$stack->size());
        //获取第一元素不改变栈的结构
        $this->assertSame('stack', $stack->peek());
        $this->assertSame(false, $stack->isEmpty());
        $this->assertSame(1,$stack->size());

        //移除栈的一个元素，返回该元素，并且影响栈的结构
        $this->assertSame("stack",$stack->pop());
        $this->assertSame(true, $stack->isEmpty());
        $this->assertSame(0,$stack->size());
    }
}