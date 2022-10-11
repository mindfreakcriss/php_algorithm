<?php

namespace Criss\PhpAlgorithm;

include_once "../src/Node.php";
include_once "../src/UnorderedList.php";


$list = new UnorderedList();

$list->add(2);

//$list->show();

//var_dump($list->isEmpty());
//
//var_dump($list->length());
//
//var_dump($list->search(333));
//
//var_dump($list->search(2));

$list->add(33);

//$list->show();

//var_dump($list->remove(2));

//$list->show();

$list->append(21);

$list->append(221111);

//$list->show();

//var_dump($list->index(33));

//$list->insert(0,1);

$list->insert(3,31);

$list->show();

echo "----\n";

$list->pop();

$list->show();

echo "----\n";

$list->popByPos(2);

$list->show();