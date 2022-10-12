<?php

namespace Criss\PhpAlgorithm;

include_once "../src/BinaryTree.php";

$r = new BinaryTree("a");

$r->insertLeft("b");

$r->insertRight("c");

$r->frontShow();

echo "\n";

$r->middleShow();

echo "\n";

$r->rearShow();
