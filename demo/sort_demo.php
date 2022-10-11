<?php

namespace Criss\PhpAlgorithm;

include_once "../src/Sort.php";

$array = [1,2,3,4,5];

//$sort = Sort::bubbleSort($array);

//var_dump($sort);

//$sort = Sort::chooseSort($array);

//var_dump($sort);

$sort = Sort::insertSort($array);

var_dump($sort);
