<?php

namespace Criss\PhpAlgorithm;

class Node
{
    private $data;

    private $next;

    public function __construct($data)
    {
        $this->data = $data;
        $this->next = null;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function setNext($next)
    {
        $this->next = $next;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getNext()
    {
        return $this->next;
    }
}