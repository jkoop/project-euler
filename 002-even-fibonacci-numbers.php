<?php

$answer = 0;

$old = 1;
$new = 0;
$tmp = 0;

while($new < 4000000){
	$tmp = $new;
	$new = $new + $old;
	$old = $tmp;

	if($new % 2 == 0){
		$answer += $new;
	}
}

echo $answer;
