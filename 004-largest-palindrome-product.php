<?php

$palindromes = [];

for($i=100; $i<1000; $i++){
	for($j=100; $j<1000; $j++){
		$tmp = $i * $j;
	        if(reverse($tmp) == $tmp){
			$palindromes[] = $tmp;
		}
	}
}

rsort($palindromes);

echo $palindromes[0];

function reverse($a){
	$a = '' . $a;
	$r = '';

	for($i = strlen($a) - 1; $i >= 0; $i--){
		$r .= $a[$i];
	}

	return $r;
}
