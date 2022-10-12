<?php

namespace Criss\PhpAlgorithm;

include_once "../src/BinaryTree.php";

$r = new BinaryTree("a");

$r->insertLeft("b");

var_dump($r->getLeftChild()->getRootVal());

$r->insertRight("c");

var_dump($r->getRightChild()->getRootVal());

$r->getRightChild()->setRootVal("Hello");

var_dump($r->getRightChild()->getRootVal());

var_dump($r);