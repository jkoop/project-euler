<?php

// https://projecteuler.net/problem=5
// 2520 is the smallest number that can be divided by each of the numbers from 1 to 10 without any remainder.  What is the smallest positive number that is evenly divisible by all of the numbers from 1 to 20?
// took 1m2s to run

$i = 1; // not zero; zero is divisible by all numbers

while (!isDivisible($i)) {
    $i++;
}

echo $i;
exit;

function isDivisible($i) {
    for ($j = 1; $j <= 20; $j++) {
        if ($i % $j != 0) {
            return false;
        }
    }
    return true;
}