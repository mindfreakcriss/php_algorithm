<?php

namespace Criss\PhpAlgorithm;

include_once "../src/BinaryHeap.php";

$array = [3,2,1,4];

$minHeap = new BinaryHeap();

$minHeap->buildHeap($array);

$minHeap->insert(7);

$minHeap->insert(0.5);

$minHeap->show();