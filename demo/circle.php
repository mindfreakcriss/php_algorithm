<?php

namespace Criss\PhpAlgorithm;

include_once "../src/Queue.php";

function circle($total, $num)
{
    $temp = new Queue();
    for ($i = 1; $i <= $total; $i++) {
        $temp->enqueue($i);
    }

    while (!$temp->isEmpty()) {
        for ($i = 1; $i <= $num ; $i++) {
            $out = $temp->dequeue();
            if ($i == $num) {
                echo "out {$out}\n";
            } else {
                $temp->enqueue($out);
            }
        }
    }
}

circle(10,3);