<?php

// https://projecteuler.net/problem=7
// By listing the first six prime numbers: 2, 3, 5, 7, 11, and 13, we can see that the 6th prime is 13.  What is the 10,001st prime number?

$number = 2;
$prime_count = 0;

while ($prime_count < 10001) {
	$is_prime = true;
	$sqrt = sqrt($number);

	for ($i = 2; $i <= $sqrt; $i++) {
		if ($number % $i == 0) {
			$is_prime = false;
			break;
		}
	}

	if ($is_prime) {
		$prime_count++;
		echo $number . PHP_EOL;
	}

	$number++;
}
