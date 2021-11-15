<?php

// https://projecteuler.net/problem=10
// The sum of the primes below 10 is 2 + 3 + 5 + 7 = 17.
// Find the sum of all the primes below two million.

$number = 2;
$sum = 0;

while ($number < 2000000) {
	$is_prime = true;
	$sqrt = sqrt($number);

	for ($i = 2; $i <= $sqrt; $i++) {
		if ($number % $i == 0) {
			$is_prime = false;
			break;
		}
	}

	if ($is_prime) {
		$sum += $number;
	}

	$number++;
}

echo $sum . PHP_EOL;
