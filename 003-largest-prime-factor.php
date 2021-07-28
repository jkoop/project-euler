<?php

$input = 600851475143;
$factors = [];

$sqrt = sqrt($input);

for($i=2; $i<=$sqrt; $i++){
	$tmp = $input / $i;

	if(is_int($tmp)){
		$factors[] = $i;
		$factors[] = $tmp;
	}
}

foreach($factors as &$f){
	$sqrt = sqrt($f);
	$isPrime = true;

	for($i=2; $i<=$sqrt; $i++){
	        $tmp = $f / $i;

	        if(is_int($tmp)){
	                $isPrime = false;
	        }
	}

	if(!$isPrime){
		$f = 0;
	}
}

rsort($factors);

echo $factors[0];
